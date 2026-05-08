<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Donation;
use Illuminate\Support\Facades\Auth;

class Riwayat extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $activities = Donation::where('user_id', Auth::id())
            ->latest()
            ->paginate(5);

        return view('livewire.riwayat', [
            'activities' => $activities
        ])->layout('components.layouts.app');
    }
}