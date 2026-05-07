<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\PermintaanModel; // Atau model donasi kamu
use Livewire\WithPagination;

class Riwayat extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        // Contoh mengambil data dari database dengan paginasi
        $activities = PermintaanModel::latest()->paginate(5);

        return view('livewire.riwayat', [
            'activities' => $activities
        ])->layout('components.layouts.app');
    }
}