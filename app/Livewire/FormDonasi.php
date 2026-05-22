<?php

namespace App\Livewire;

use App\Models\Donation;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormDonasi extends Component
{
    use WithFileUploads;

    public $rebox_id = 1;
    public $nama_barang;
    public $jumlah;
    public $kategori;
    public $foto;
    public $deskripsi;
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
        $images = [
            'images/GambarcardRebox1.png',
            'images/GambarcardRebox2.png',
            'images/GambarcardRebox3.png',
            'images/GambarcardRebox4.png',
        ];

        $names = [
            'Dago', 'Lembang', 'Braga', 'Cihampelas', 'Gedebage',
            'Cibaduyut', 'Ciwidey', 'Pangalengan', 'Bojongsoang', 'Setiabudi',
            'Pasteur', 'Antapani', 'Arcamanik', 'Ujungberung', 'Soreang',
            'Padalarang', 'Cimahi', 'Jatinangor', 'Dayeuhkolot', 'Cileunyi',
        ];

        $codes = [
            'DG-01', 'LB-02', 'BR-03', 'CH-04', 'GD-05',
            'CB-06', 'CW-07', 'PG-08', 'BS-09', 'SB-10',
            'PS-11', 'AP-12', 'AM-13', 'UB-14', 'SR-15',
            'PD-16', 'CM-17', 'JT-18', 'DK-19', 'CL-20',
        ];

        return collect($names)->map(fn ($name, $index) => [
            'id' => $index + 1,
            'name' => $name,
            'title' => 'Rebox ' . $name,
            'area' => $name . ', Kota Bandung',
            'distance' => ($index % 5) + 1 . '.' . ($index % 8) . ' km',
            'code' => $codes[$index],
            'image' => asset($images[$index % count($images)]),
        ])->all();
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

        if (strtoupper(trim($this->kode_box_input)) !== $this->selectedLocation['code']) {
            $this->addError('kode_box_input', 'Kode box tidak sesuai dengan lokasi yang dipilih.');
            return;
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
        ]);

        $pathFoto = $this->foto->store('donasi', 'public');

        Donation::create([
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
