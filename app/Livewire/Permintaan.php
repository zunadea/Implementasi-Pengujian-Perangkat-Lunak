<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\PermintaanModel;
use Illuminate\Support\Facades\Auth;

class Permintaan extends Component
{
    // Properti untuk menampung input form
    public $nama_barang;
    public $kategori;
    public $jumlah;
    public $deskripsi;
    public $urgensi = 'Normal'; 
    public $lokasi_hub;
    
    // Properti untuk fitur search lokasi
    public $search = ''; // Search untuk filter card (jika digunakan)
    public $search_lokasi = ''; // Search untuk fitur autocomplete kecamatan

    /**
     * mount() dijalankan pertama kali saat komponen diakses.
     * Proteksi internal agar hanya role 'penerima' yang bisa buka form ini.
     */
    public function mount()
    {
        // Pastikan user login dan memiliki role penerima
        if (Auth::check() && Auth::user()->role !== 'penerima') {
            // Jika donatur mencoba akses, lempar balik ke dashboard
            return redirect()->to('/dashboard');
        }
    }

    /**
     * Fungsi untuk memilih lokasi dari card di view.
     */
    public function setLokasi($namaLokasi)
    {
        $this->lokasi_hub = $namaLokasi;
        // Opsional: isi search_lokasi agar input text sinkron dengan pilihan card
        $this->search_lokasi = $namaLokasi;
    }

    /**
     * Fungsi baru untuk memilih lokasi dari hasil pencarian autocomplete.
     */
    public function selectLokasi($nama)
    {
        $this->lokasi_hub = $nama;
        $this->search_lokasi = $nama;
    }

    /**
     * Proses pengiriman form permintaan barang.
     */
    public function submit()
    {
        // 1. Validasi Input
        $this->validate([
            'nama_barang' => 'required|min:3',
            'kategori'    => 'required',
            'jumlah'      => 'required|numeric|min:1',
            'deskripsi'   => 'required',
            'lokasi_hub'  => 'required',
        ], [
            'lokasi_hub.required' => 'Silakan pilih lokasi drop-off terlebih dahulu.',
        ]);

        // 2. Simpan ke Database
        PermintaanModel::create([
            'nama_barang' => $this->nama_barang,
            'kategori'    => $this->kategori,
            'jumlah'      => $this->jumlah,
            'deskripsi'   => $this->deskripsi,
            'urgensi'     => $this->urgensi,
            'lokasi_hub'  => $this->lokasi_hub,
            // Menyimpan ID pengguna yang membuat permintaan
            'user_id'     => Auth::id(), 
            'status'      => 'Pending', // Status awal saat permintaan dibuat
        ]);

        // 3. Beri notifikasi ke session
        session()->flash('message', 'Permintaan barang berhasil dikirim! Tim ReBox akan segera meninjau kebutuhan Anda.');

        // 4. Redirect ke halaman riwayat pribadi penerima
        return $this->redirect(route('riwayat'), navigate: true);
    }

    public function render()
    {
        // Daftar kecamatan berdasarkan input Anda
        $daftar_kecamatan = [
            // Kota Bandung
            'Andir', 'Antapani', 'Arcamanik', 'Astana Anyar', 'Babakan Ciparay', 'Bandung Kidul', 
            'Bandung Kulon', 'Bandung Wetan', 'Batununggal', 'Bojongloa Kaler', 'Bojongloa Kidul', 
            'Buahbatu', 'Cibeunying Kaler', 'Cibeunying Kidul', 'Cicadas', 'Cicendo', 'Cidadap', 
            'Cinambo', 'Coblong', 'Gedebage', 'Kiaracondong', 'Lengkong', 'Mandalajati', 
            'Panyileukan', 'Rancasari', 'Regol', 'Sukajadi', 'Sukasari', 'Sumur Bandung', 'Ujungberung',
            // Kabupaten Bandung
            'Arjasari', 'Baleendah', 'Banjaran', 'Bojongsoang', 'Cangkuang', 'Cicalengka', 'Cikancung', 
            'Cilengkrang', 'Cileunyi', 'Ciparay', 'Ciwidey', 'Dayeuhkolot', 'Ibun', 'Katapang', 
            'Kertasari', 'Kutawaringin', 'Majalaya', 'Margaasih', 'Margahayu', 'Nagreg', 'Pacet', 
            'Pameungpeuk', 'Paseh', 'Pasirjambu', 'Rancaekek', 'Rancabali', 'Solokanjeruk', 'Soreang', 
            'Cimenyan', 'Cimaung', 'Pangalengan',
            // Kabupaten Bandung Barat
            'Batujajar', 'Cihampelas', 'Cililin', 'Cipatat', 'Cipeundeuy', 'Cipongkor', 'Cisarua', 
            'Gununghalu', 'Lembang', 'Ngamprah', 'Padalarang', 'Parongpong', 'Rongga', 'Saguling', 'Sindangkerta'
        ];

        $results = [];

        // Logika pencarian: tampilkan hasil jika user mengetik minimal 2 karakter
        if (strlen($this->search_lokasi) >= 2) {
            $results = array_filter($daftar_kecamatan, function($kecamatan) {
                return str_contains(strtolower($kecamatan), strtolower($this->search_lokasi));
            });
            
            // Batasi hasil agar tidak terlalu panjang di dropdown
            $results = array_slice($results, 0, 8);
        }

        return view('livewire.permintaan', [
            'results' => $results
        ])->layout('components.layouts.app'); 
    }
}