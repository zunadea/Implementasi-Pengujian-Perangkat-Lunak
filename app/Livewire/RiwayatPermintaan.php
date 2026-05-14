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
        
        // Ubah status menjadi 'Disetujui'
        // Opsional: Kamu bisa menambahkan kolom 'donatur_id' di database jika ingin mencatat siapa yang membantu
        $permintaan->update([
            'status' => 'Disetujui'
        ]);

        session()->flash('message', 'Terima kasih! Anda telah menyetujui untuk memenuhi kebutuhan ini.');
    }

    public function render()
    {
        /** 
         * PERBAIKAN: Kita ambil SEMUA data (Pending & Disetujui).
         * Filter pemisahan tampilan dilakukan di file Blade menggunakan @forelse dengan collection filter.
         */
        $riwayat = PermintaanModel::with('user')
            ->orderByRaw("FIELD(urgensi, 'Mendesak', 'Penting', 'Normal')")
            ->latest()
            ->paginate(20); // Naikkan jumlah pagination jika perlu agar riwayat tetap muncul

        return view('livewire.riwayat-permintaan', [
            'riwayat' => $riwayat
        ])->layout('components.layouts.app');
    }
}