<?php

namespace App\Livewire;

use App\Models\Donation;
<<<<<<< HEAD
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
=======
use App\Models\ReboxOpening;
use App\Support\ReboxLocations;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Livewire\Component;
use Livewire\WithFileUploads;
>>>>>>> zunadeafiturv1

class FormDonasi extends Component
{
    use WithFileUploads;

<<<<<<< HEAD
    // Properti Identitas & Lokasi
    public $rebox_id;
    public $nama_lokasi;
    public $filter_wilayah = ''; 
    public $search_lokasi = '';

    // Properti Form Barang
=======
    public $rebox_id = 1;
>>>>>>> zunadeafiturv1
    public $nama_barang;
    public $jumlah;
    public $kategori;
    public $foto;
    public $deskripsi;
<<<<<<< HEAD
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
=======
    public $nama_lokasi;
    public $kondisi;
    public $search_lokasi = '';
    public $kode_box_input = '';
    public $step = 'form';

    public array $selectedLocation = [];

    public function mount($name)
    {
        $requestedName = str_replace('Rebox ', '', $name);
        $location = collect($this->locations())->firstWhere('name', $requestedName)
            ?? $this->locations()[0];

        $this->selectLocation($location['name']);
    }

    public function locations(): array
    {
        return collect(ReboxLocations::all())
            ->map(fn ($location) => array_merge($location, [
                'maps_url' => 'https://www.google.com/maps/search/?api=1&query=' . urlencode($location['title'] . ' ' . $location['area']),
            ]))
            ->all();
    }

    public function filteredLocations(): array
    {
        $query = strtolower(trim($this->search_lokasi));

        if ($query === '') {
            return $this->locations();
        }

        return collect($this->locations())
            ->filter(fn ($location) => str_contains(strtolower($location['title']), $query)
                || str_contains(strtolower($location['area']), $query)
                || str_contains(strtolower($location['name']), $query))
            ->values()
            ->all();
    }

    public function selectLocation($name)
    {
        $location = collect($this->locations())->firstWhere('name', $name) ?? $this->locations()[0];

        $this->selectedLocation = $location;
        $this->nama_lokasi = $location['title'];
        $this->rebox_id = $location['id'];
        $this->kode_box_input = '';
    }

    public function updated($property)
    {
        $this->resetErrorBag($property);
    }

    public function kirimDonasi()
    {
        $this->validateDonationForm();
        $this->step = 'code';
    }

    public function bukaBox()
    {
        $this->validate([
            'kode_box_input' => ['required', 'string'],
        ], [
            'kode_box_input.required' => 'Kode box wajib diisi.',
        ]);

        $scannedCode = ReboxLocations::extractCode((string) $this->kode_box_input);

        if ($scannedCode !== $this->selectedLocation['code']) {
            $this->addError('kode_box_input', 'Kode box tidak sesuai dengan lokasi yang dipilih.');
            return;
        }

        $this->kode_box_input = $scannedCode;

        if (Schema::hasTable('rebox_openings')) {
            ReboxOpening::create([
                'user_id' => Auth::id(),
                'rebox_id' => $this->selectedLocation['id'],
                'rebox_code' => $this->selectedLocation['code'],
                'rebox_name' => $this->selectedLocation['title'],
                'opened_by' => 'qr-donation-camera',
                'status' => 'Terbuka',
            ]);
        }

        $this->step = 'open';
        $this->dispatch('box-opened');
    }

    public function selesaiDonasi()
    {
        $this->validateDonationForm();

        $this->validate([
            'foto' => ['required', 'image', 'max:2048'],
        ], [
            'foto.required' => 'Foto bukti barang wajib diisi.',
            'foto.image' => 'File harus berupa gambar.',
            'foto.max' => 'Foto maksimal 2MB.',
>>>>>>> zunadeafiturv1
        ]);

        $pathFoto = $this->foto->store('donasi', 'public');

        Donation::create([
<<<<<<< HEAD
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
=======
            'user_id' => Auth::id(),
            'rebox_id' => $this->rebox_id,
            'nama_barang' => $this->nama_barang,
            'jumlah' => $this->jumlah,
            'kategori' => $this->kategori,
            'kondisi' => $this->kondisi,
            'foto' => $pathFoto,
            'deskripsi' => $this->deskripsi,
            'status' => 'pending',
        ]);

        $this->step = 'success';
    }

    public function expireBox()
    {
        if ($this->step === 'open') {
            $this->step = 'code';
            $this->foto = null;
            session()->flash('message', 'Donasi gagal. Waktu akses box sudah habis, silakan lakukan donasi ulang.');
        }
    }

    public function resetToForm()
    {
        $this->step = 'form';
        $this->kode_box_input = '';
    }

    private function validateDonationForm(): void
    {
        $this->validate([
            'nama_barang' => ['required', 'string', 'min:3', 'max:100'],
            'jumlah' => ['required', 'integer', 'min:1', 'max:1000'],
            'kategori' => ['required', 'string'],
            'kondisi' => ['required', 'string'],
            'deskripsi' => ['required', 'string', function ($attribute, $value, $fail) {
                if (str_word_count(strip_tags($value)) > 100) {
                    $fail('Deskripsi maksimal 100 kata.');
                }
            }],
        ], [
            'nama_barang.required' => 'Nama barang wajib diisi.',
            'jumlah.required' => 'Jumlah barang wajib diisi.',
            'jumlah.integer' => 'Jumlah barang harus berupa angka.',
            'jumlah.max' => 'Jumlah barang maksimal 1000.',
            'kategori.required' => 'Kategori barang wajib dipilih.',
            'kondisi.required' => 'Kondisi barang wajib dipilih.',
            'deskripsi.required' => 'Deskripsi barang wajib diisi.',
        ]);
    }

    public function render()
    {
        return view('livewire.form-donasi', [
            'locations' => $this->filteredLocations(),
        ])->layout('components.layouts.app');
    }
}
>>>>>>> zunadeafiturv1
