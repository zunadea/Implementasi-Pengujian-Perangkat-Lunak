<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Auth;
<<<<<<< HEAD
=======
use App\Models\Donation;
use App\Models\PermintaanModel;
>>>>>>> zunadeafiturv1

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
<<<<<<< HEAD
        return view('livewire.dashboard');
    }
}
=======
        $user = Auth::user();
        $isRecipient = $user?->role === 'penerima';

        $dashboardTotal = $isRecipient
            ? PermintaanModel::where('user_id', $user?->id)
                ->whereIn('status', ['Selesai', 'selesai', 'Disetujui', 'disetujui', 'completed'])
                ->sum('jumlah')
            : Donation::where('user_id', $user?->id)->count();

        return view('livewire.dashboard', [
            'dashboardTotal' => (int) $dashboardTotal,
        ]);
    }
}
>>>>>>> zunadeafiturv1
