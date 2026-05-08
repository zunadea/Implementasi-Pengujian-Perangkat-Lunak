<?php

namespace App\Livewire;

use App\Models\Donation;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class FormDonasi extends Component
{
    use WithFileUploads;

    public $rebox_id;
    public $nama_barang;
    public $jumlah;
    public $kategori;
    public $foto;
    public $deskripsi;
    public $nama_lokasi;
    public $kondisi;

    public function mount($name)
    {
        $this->nama_lokasi = $name;

        // sementara isi manual/null dulu
        $this->rebox_id = 1;
    }

    public function simpanDonasi()
    {
        $this->validate([
            'nama_barang' => 'required|min:3',
            'jumlah'      => 'required|numeric|min:1',
            'kategori'    => 'required',
            'kondisi'     => 'required',
            'foto'        => 'required|image|max:2048',
            'deskripsi'   => 'nullable|string|max:500',
        ]);

        $pathFoto = $this->foto->store('donasi', 'public');

        Donation::create([
            'user_id'     => Auth::id(),
            'rebox_id'    => $this->rebox_id,
            'nama_barang' => $this->nama_barang,
            'jumlah'      => $this->jumlah,
            'kategori'    => $this->kategori,
            'kondisi'     => $this->kondisi,
            'foto'        => $pathFoto,
            'deskripsi'   => $this->deskripsi,
            'status'      => 'pending',
        ]);

        session()->flash('message', 'Donasi berhasil dikirim!');

        return redirect()->route('riwayat');
    }

    public function render()
    {
        return view('livewire.form-donasi', [
            'lokasiTerpilihName' => $this->nama_lokasi
        ]);
    }
}