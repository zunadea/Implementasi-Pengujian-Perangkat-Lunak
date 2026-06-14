<?php

namespace Database\Factories;

use App\Models\Donation;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class DonationFactory extends Factory
{
    protected $model = Donation::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'rebox_id' => 1,
            'nama_barang' => 'Baju Layak Pakai',
            'jumlah' => 3,
            'kategori' => 'Pakaian',
            'kondisi' => 'Layak',
            'foto' => 'donasi/default.png',
            'deskripsi' => 'Barang masih layak untuk digunakan kembali.',
            'status' => 'pending',
        ];
    }
}
