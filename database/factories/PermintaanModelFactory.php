<?php

namespace Database\Factories;

use App\Models\PermintaanModel;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PermintaanModelFactory extends Factory
{
    protected $model = PermintaanModel::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'nama_barang' => 'Baju Anak',
            'kategori' => 'Pakaian',
            'jumlah' => 3,
            'deskripsi' => 'Membutuhkan barang yang masih layak pakai',
            'urgensi' => 'Normal',
            'lokasi_hub' => 'Bandung',
            'google_maps_link' => 'https://maps.google.com/?q=Bandung',
            'status' => 'Pending',
        ];
    }
}
