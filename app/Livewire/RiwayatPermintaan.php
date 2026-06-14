<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\PermintaanModel;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class RiwayatPermintaan extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    /**
     * mount() untuk proteksi akses.
     * Memastikan hanya Donatur yang bisa melihat daftar semua permintaan.
     */
    public function mount()
    {
        // Jika user bukan donatur, kembalikan ke dashboard
        if (Auth::check() && Auth::user()->role !== 'donatur') {
            return redirect()->to('/dashboard');
        }
    }

    /**
     * Fungsi untuk Donatur menyetujui/memenuhi permintaan.
     */
    public function setujuiPermintaan(int $id): void
    {
        $updated = PermintaanModel::whereKey($id)
            ->whereIn('status', ['Pending', 'pending', 'Menunggu', 'menunggu'])
            ->whereNull('fulfilled_by_user_id')
            ->update([
                'status' => 'Disetujui',
                'fulfilled_by_user_id' => Auth::id(),
                'fulfilled_at' => now(),
            ]);

        if (! $updated) {
            session()->flash('error', 'Permintaan ini sudah dipenuhi oleh donatur lain.');
            return;
        }

        session()->flash('message', 'Permintaan berhasil disetujui dan masuk ke riwayat penyaluran Anda.');
    }

    public function render()
    {
        /** * Mengambil data permintaan dari SEMUA penerima.
         * Kita filter agar donatur hanya melihat permintaan yang masih 'Pending'.
         * Diurutkan berdasarkan Urgensi (Mendesak dulu) kemudian waktu terbaru.
         */
        $riwayat = PermintaanModel::with('user') // Pastikan ada relasi 'user' di model Anda
            ->whereIn('status', ['Pending', 'pending', 'Menunggu', 'menunggu'])
            ->whereNull('fulfilled_by_user_id')
            ->orderByRaw("FIELD(urgensi, 'Mendesak', 'Penting', 'Normal')")
            ->latest()
            ->paginate(10);

        return view('livewire.riwayat-permintaan', [
            'riwayat' => $riwayat
        ])->layout('components.layouts.app');
    }
}
