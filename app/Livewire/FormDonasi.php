<?php

namespace App\Livewire;

use App\Models\Donation;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class FormDonasi extends Component
{
    use WithFileUploads;

    // Properti Identitas & Lokasi
    public $rebox_id;
    public $nama_lokasi;
    public $filter_wilayah = ''; 
    public $search_lokasi = '';

    // Properti Form Barang
    public $nama_barang;
    public $jumlah;
    public $kategori;
    public $foto;
    public $deskripsi;
    public $kondisi;

    /**
     * Inisialisasi komponen saat pertama kali dimuat.
     */
    public function mount($name = null)
    {
        $this->nama_lokasi = $name;
        
        if ($name) {
            $this->filter_wilayah = $name;
        }

        // Default rebox_id
        $this->rebox_id = 1;
    }

    /**
     * Fungsi untuk memilih lokasi dari card di view.
     */
    public function setLokasi($slug, $nama)
    {
        $this->filter_wilayah = $slug;
        $this->nama_lokasi = $nama;
        $this->search_lokasi = $nama;
    }

    /**
     * Validasi dan simpan data donasi ke database.
     */
    public function simpanDonasi()
    {
        $this->validate([
            'nama_barang' => 'required|min:3',
            'jumlah'      => 'required|numeric|min:1',
            'kategori'    => 'required',
            'kondisi'     => 'required',
            'foto'        => 'required|image|max:2048',
            'deskripsi'   => 'nullable|string|max:500',
            'filter_wilayah' => 'required', 
        ], [
            'filter_wilayah.required' => 'Silakan pilih lokasi drop-off terlebih dahulu.',
            'foto.max' => 'Ukuran foto maksimal adalah 2MB.',
        ]);

        $pathFoto = $this->foto->store('donasi', 'public');

        Donation::create([
            'user_id'     => Auth::id(),
            'rebox_id'    => $this->rebox_id,
            'nama_barang' => $this->nama_barang,
            'jumlah'      => $this->jumlah,
            'kategori'    => $this->kategori,
            'kondisi'     => $this->kondisi,
            'foto'        => $pathFoto,
            'deskripsi'   => $this->deskripsi,
            'status'      => 'pending',
        ]);

        session()->flash('message', 'Donasi berhasil dikirim!');

        return redirect()->route('riwayat');
    }

    /**
     * Render view livewire.form-donasi
     */
    public function render()
    {
        // Data wilayah disamakan dengan halaman Permintaan
        $lokasiBandung = [
            ['id' => 1, 'slug' => 'BuahBatu', 'nama' => 'Rebox Buah Batu', 'alamat' => 'Jl. Buah Batu No. 12, Lengkong, Bandung', 'jarak' => '0.5 km', 'img' => 'https://images.unsplash.com/photo-1555066931-4365d14bab8c?q=80&w=500'],
            ['id' => 2, 'slug' => 'Dago', 'nama' => 'Rebox Dago Point', 'alamat' => 'Jl. Ir. H. Juanda No. 84, Coblong, Bandung', 'jarak' => '1.2 km', 'img' => 'https://images.unsplash.com/photo-1497366216548-37526070297c?q=80&w=500'],
            ['id' => 3, 'slug' => 'Cibiru', 'nama' => 'Rebox Cibiru Square', 'alamat' => 'Jl. Raya Cibiru No. 45, Bandung Timur', 'jarak' => '2.5 km', 'img' => 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?q=80&w=500'],
            ['id' => 4, 'slug' => 'Antapani', 'nama' => 'Rebox Antapani Hub', 'alamat' => 'Jl. Terusan Jakarta No. 10, Bandung', 'jarak' => '3.1 km', 'img' => 'https://images.unsplash.com/photo-1590644365607-1c5a519a7a37?q=80&w=500'],
        ];

        $listLokasi = collect($lokasiBandung);

        // Filter lokasi berdasarkan input pencarian
        if (!empty($this->search_lokasi)) {
            $listLokasi = $listLokasi->filter(function($item) {
                return str_contains(strtolower($item['nama']), strtolower($this->search_lokasi)) || 
                       str_contains(strtolower($item['alamat']), strtolower($this->search_lokasi));
            });
        }

        return view('livewire.form-donasi', [
            'lokasiTerpilihName' => $this->nama_lokasi,
            'daftarLokasi' => $listLokasi
        ]);
    }
}