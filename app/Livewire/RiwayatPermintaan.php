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
<<<<<<< HEAD
=======
     * Memastikan hanya Donatur yang bisa melihat daftar semua permintaan.
>>>>>>> zunadeafiturv1
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
        
<<<<<<< HEAD
        // Ubah status menjadi 'Disetujui'
        // Opsional: Kamu bisa menambahkan kolom 'donatur_id' di database jika ingin mencatat siapa yang membantu
=======
        // Ubah status menjadi 'Disetujui' atau 'Diproses'
>>>>>>> zunadeafiturv1
        $permintaan->update([
            'status' => 'Disetujui'
        ]);

        session()->flash('message', 'Terima kasih! Anda telah menyetujui untuk memenuhi kebutuhan ini.');
    }

    public function render()
    {
<<<<<<< HEAD
        /** 
         * PERBAIKAN: Kita ambil SEMUA data (Pending & Disetujui).
         * Filter pemisahan tampilan dilakukan di file Blade menggunakan @forelse dengan collection filter.
         */
        $riwayat = PermintaanModel::with('user')
            ->orderByRaw("FIELD(urgensi, 'Mendesak', 'Penting', 'Normal')")
            ->latest()
            ->paginate(20); // Naikkan jumlah pagination jika perlu agar riwayat tetap muncul
=======
        /** * Mengambil data permintaan dari SEMUA penerima.
         * Kita filter agar donatur hanya melihat permintaan yang masih 'Pending'.
         * Diurutkan berdasarkan Urgensi (Mendesak dulu) kemudian waktu terbaru.
         */
        $riwayat = PermintaanModel::with('user') // Pastikan ada relasi 'user' di model Anda
            ->where('status', 'Pending')
            ->orderByRaw("FIELD(urgensi, 'Mendesak', 'Penting', 'Normal')")
            ->latest()
            ->paginate(10);
>>>>>>> zunadeafiturv1

        return view('livewire.riwayat-permintaan', [
            'riwayat' => $riwayat
        ])->layout('components.layouts.app');
    }
}