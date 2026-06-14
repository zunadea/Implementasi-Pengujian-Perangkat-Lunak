<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Auth;
use App\Models\Donation;
use App\Models\PermintaanModel;
use Illuminate\Support\Facades\Storage;

#[Title('Dashboard')] 
class Dashboard extends Component
{
    // State untuk kontrol tampilan
    public $isDonating = false;

    // State untuk form data
    public $nama_barang, $kategori, $deskripsi;
    public $jumlah = 1;
    public $kondisi = 'Baru';
    public $lokasi_terpilih = null;

    public function showDonationForm($lokasiId = null)
    {
        $this->lokasi_terpilih = $lokasiId;
        $this->isDonating = true;
    }

    public function hideDonationForm()
    {
        $this->isDonating = false;
        $this->reset(['nama_barang', 'kategori', 'deskripsi', 'jumlah', 'kondisi', 'lokasi_terpilih']);
    }

    public function selectKondisi($val)
    {
        $this->kondisi = $val;
    }

    public function render()
    {
        $user = Auth::user();
        $isRecipient = $user?->role === 'penerima';

        $dashboardTotal = $isRecipient
            ? PermintaanModel::where('user_id', $user?->id)
                ->whereIn('status', ['Diterima', 'diterima', 'Selesai', 'selesai', 'received', 'completed'])
                ->sum('jumlah')
            : Donation::where('user_id', $user?->id)->count();

        $inventoryByLocation = Donation::with('user')
            ->latest()
            ->get()
            ->groupBy('rebox_id')
            ->map(fn ($donations) => $donations->map(fn ($donation) => [
                'donor' => $donation->user?->name ?? 'Donatur Rebox',
                'donor_avatar' => $donation->user?->profile_photo
                    ? Storage::url($donation->user->profile_photo)
                    : ($donation->user?->google_avatar ?: null),
                'date' => $donation->created_at?->translatedFormat('d M Y') ?? '-',
                'item' => $donation->nama_barang,
                'amount' => (string) $donation->jumlah,
                'image' => $donation->foto ? Storage::url($donation->foto) : null,
            ])->values()->all())
            ->all();

        return view('livewire.dashboard', [
            'dashboardTotal' => (int) $dashboardTotal,
            'inventoryByLocation' => $inventoryByLocation,
        ]);
    }
}
