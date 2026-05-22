<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Donation;
use App\Models\PermintaanModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class Riwayat extends Component
{
    public string $tab = 'salurkan';

    public function setTab(string $tab): void
    {
        $this->tab = in_array($tab, ['salurkan', 'rebox'], true) ? $tab : 'salurkan';
    }

    private function reboxNames(): array
    {
        return [
            1 => 'Rebox Dago',
            2 => 'Rebox Lembang',
            3 => 'Rebox Braga',
            4 => 'Rebox Cihampelas',
            5 => 'Rebox Gedebage',
            6 => 'Rebox Cibaduyut',
            7 => 'Rebox Ciwidey',
            8 => 'Rebox Pangalengan',
            9 => 'Rebox Bojongsoang',
            10 => 'Rebox Setiabudi',
            11 => 'Rebox Pasteur',
            12 => 'Rebox Antapani',
            13 => 'Rebox Arcamanik',
            14 => 'Rebox Ujungberung',
            15 => 'Rebox Soreang',
            16 => 'Rebox Padalarang',
            17 => 'Rebox Cimahi',
            18 => 'Rebox Jatinangor',
            19 => 'Rebox Dayeuhkolot',
            20 => 'Rebox Cileunyi',
        ];
    }

    private function reboxHistory()
    {
        $reboxNames = $this->reboxNames();

        return Donation::where('user_id', Auth::id())
            ->latest()
            ->get()
            ->map(fn ($donation) => [
                'donatur' => Auth::user()?->name ?? 'Donatur Rebox',
                'role' => Auth::user()?->role ?? 'Donatur',
                'date' => $donation->created_at?->translatedFormat('d M Y') ?? now()->translatedFormat('d M Y'),
                'nama_barang' => $donation->nama_barang,
                'lokasi_box' => $reboxNames[$donation->rebox_id] ?? 'Rebox Dago',
                'jumlah' => $donation->jumlah . ' Pcs',
                'image' => $donation->foto && Storage::disk('public')->exists($donation->foto)
                    ? asset('storage/' . $donation->foto)
                    : asset('images/GambarcardRebox1.png'),
            ])
            ->values()
            ->all();
    }

    private function salurkanHistory(): array
    {
        return [
            [
                'donatur' => Auth::user()?->name ?? 'Muh Rheivandy',
                'role' => 'Donatur',
                'date' => 'Hari ini, 14:20 WIB',
                'nama_barang' => 'Pakaian Muslim',
                'tujuan' => 'Panti Asuhan Hijrah',
                'jumlah' => '5 Pcs',
                'status' => 'Proses',
                'image' => asset('images/GambarcardRebox2.png'),
            ],
            [
                'donatur' => Auth::user()?->name ?? 'Muh Rheivandy',
                'role' => 'Donatur',
                'date' => '12 Okt 2024',
                'nama_barang' => 'Buku Pelajaran',
                'tujuan' => 'Komunitas Cahaya Ilmu',
                'jumlah' => '2 Pcs',
                'status' => 'Selesai',
                'image' => asset('images/GambarcardRebox3.png'),
            ],
            [
                'donatur' => Auth::user()?->name ?? 'Muh Rheivandy',
                'role' => 'Donatur',
                'date' => '10 Okt 2024',
                'nama_barang' => 'Selimut Layak Pakai',
                'tujuan' => 'Panti Disabilitas Mandiri',
                'jumlah' => '6 Pcs',
                'status' => 'Proses',
                'image' => asset('images/GambarcardRebox4.png'),
            ],
        ];
    }

    private function recipientRequestHistory(): array
    {
        return PermintaanModel::where('user_id', Auth::id())
            ->latest()
            ->get()
            ->map(fn ($request) => [
                'date' => $request->created_at?->translatedFormat('d M Y') ?? now()->translatedFormat('d M Y'),
                'nama_barang' => $request->nama_barang,
                'kategori' => $request->kategori,
                'jumlah' => $request->jumlah . ' Pcs',
                'deskripsi' => $request->deskripsi,
                'status' => ucfirst($request->status ?? 'Pending'),
                'image' => asset('images/GambarcardRebox1.png'),
            ])
            ->values()
            ->all();
    }

    public function render()
    {
        return view('livewire.riwayat', [
            'salurkanHistories' => $this->salurkanHistory(),
            'reboxHistories' => $this->reboxHistory(),
            'recipientRequests' => $this->recipientRequestHistory(),
        ])->layout('components.layouts.app');
    }
}
