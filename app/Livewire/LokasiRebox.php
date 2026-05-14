<?php

namespace App\Livewire;

use Livewire\Component;

class LokasiRebox extends Component
{
    public $search = '';

    public $lokasi = [
        [
            'name' => 'Rebox Cianjur',
            'area' => 'Cianjur',
            'distance' => '4 km',
            'rating' => '4.8',
            'address' => 'Jl. Raya Cianjur No. 12',
            'image' => 'https://images.unsplash.com/photo-1532996122724-e3c354a0b15b?auto=format&fit=crop&w=700&q=80',
        ],
        [
            'name' => 'Rebox BuahBatu',
            'area' => 'BuahBatu',
            'distance' => '1 km',
            'rating' => '4.5',
            'address' => 'Jl. Buah Batu No. 88, Bandung',
            'image' => 'https://images.unsplash.com/photo-1591196131703-9b636d6901d6?auto=format&fit=crop&w=700&q=80',
        ],
        [
            'name' => 'Rebox Dago Atas',
            'area' => 'Dago',
            'distance' => '8 km',
            'rating' => '4.9',
            'address' => 'Jl. Dago Atas No. 21, Bandung',
            'image' => 'https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=700&q=80',
        ],
        [
            'name' => 'Rebox Pasteur',
            'area' => 'Pasteur',
            'distance' => '12 km',
            'rating' => '4.7',
            'address' => 'Jl. Pasteur No. 45, Bandung',
            'image' => 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=700&q=80',
        ],
        [
            'name' => 'Rebox Sudirman Central',
            'area' => 'Sudirman',
            'distance' => '0.8 km',
            'rating' => '4.9',
            'address' => 'Jl. Jend. Sudirman No. 52',
            'image' => 'https://images.unsplash.com/photo-1497366216548-37526070297c?q=80&w=700',
        ],
        [
            'name' => 'Grand Indonesia Hub',
            'area' => 'Menteng',
            'distance' => '1.2 km',
            'rating' => '4.6',
            'address' => 'Lantai LG Barat, Menteng',
            'image' => 'https://images.unsplash.com/photo-1497366754035-f200968a6e72?q=80&w=700',
        ],
    ];

    public function getFilteredLokasiProperty()
    {
        if (!$this->search) {
            return $this->lokasi;
        }

        return collect($this->lokasi)->filter(function ($item) {
            return str_contains(strtolower($item['name']), strtolower($this->search))
                || str_contains(strtolower($item['area']), strtolower($this->search))
                || str_contains(strtolower($item['address']), strtolower($this->search));
        })->values()->toArray();
    }

    public function render()
    {
        return view('livewire.lokasi-rebox');
    }
}