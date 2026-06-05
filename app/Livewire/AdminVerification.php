<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Admin Verifikasi NIK')]
class AdminVerification extends Component
{
    public function approve(int $userId): void
    {
        $user = User::where('verification_status', 'pending')->findOrFail($userId);
        $user->verification_status = 'verified';
        $user->save();

        session()->flash('message', 'Profil NIK berhasil disetujui.');
    }

    public function reject(int $userId): void
    {
        $user = User::where('verification_status', 'pending')->findOrFail($userId);
        $user->verification_status = 'rejected';
        $user->save();

        session()->flash('message', 'Profil NIK ditolak.');
    }

    public function render()
    {
        return view('livewire.admin-verification', [
            'pendingUsers' => User::where('verification_status', 'pending')
                ->latest('verification_submitted_at')
                ->get(),
            'approvedUsers' => User::where('verification_status', 'verified')
                ->whereNotNull('verification_nik')
                ->latest('updated_at')
                ->get(),
            'rejectedUsers' => User::where('verification_status', 'rejected')
                ->whereNotNull('verification_nik')
                ->latest('updated_at')
                ->get(),
        ])->layout('components.layouts.app');
    }
}
