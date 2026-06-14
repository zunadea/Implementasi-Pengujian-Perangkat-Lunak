<?php

namespace App\Livewire;

use App\Models\Donation;
use App\Models\ReboxOpening;
use App\Support\ReboxLocations;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormDonasi extends Component
{
    use WithFileUploads;

    public $rebox_id;
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

    public function mount(?string $name = null): void
    {
        if (! $name) {
            $this->selectLocation($this->locations()[0]['name']);
            return;
        }

        $requestedName = str_replace('Rebox ', '', $name);
        $location = collect($this->locations())->firstWhere('name', $requestedName);

        if ($location) {
            $this->selectLocation($location['name']);
            return;
        }

        $this->selectLocation($this->locations()[0]['name']);
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
        $location = collect($this->locations())->firstWhere('name', $name);

        if (! $location) {
            return;
        }

        $this->selectedLocation = $location;
        $this->nama_lokasi = $location['title'];
        $this->rebox_id = $location['id'];
        $this->kode_box_input = '';
        $this->resetErrorBag('selectedLocation');
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
            'selectedLocation' => ['required', 'array', 'min:1'],
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
            'selectedLocation.required' => 'Pilih lokasi Rebox terlebih dahulu.',
            'selectedLocation.min' => 'Pilih lokasi Rebox terlebih dahulu.',
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
