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
    public function setujuiPermintaan($id)
    {
        $permintaan = PermintaanModel::findOrFail($id);
        
        // Ubah status menjadi 'Disetujui' atau 'Diproses'
        $permintaan->update([
            'status' => 'Disetujui'
        ]);

        session()->flash('message', 'Terima kasih! Anda telah menyetujui untuk memenuhi kebutuhan ini.');
    }

    public function render()
    {
        /** * Mengambil data permintaan dari SEMUA penerima.
         * Kita filter agar donatur hanya melihat permintaan yang masih 'Pending'.
         * Diurutkan berdasarkan Urgensi (Mendesak dulu) kemudian waktu terbaru.
         */
        $riwayat = PermintaanModel::with('user') // Pastikan ada relasi 'user' di model Anda
            ->where('status', 'Pending')
            ->orderByRaw("FIELD(urgensi, 'Mendesak', 'Penting', 'Normal')")
            ->latest()
            ->paginate(10);

        return view('livewire.riwayat-permintaan', [
            'riwayat' => $riwayat
        ])->layout('components.layouts.app');
    }
}