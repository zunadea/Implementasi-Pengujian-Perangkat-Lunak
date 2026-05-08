<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'rebox_id',
        'nama_barang',
        'jumlah',
        'kategori',
        'kondisi',
        'foto',
        'deskripsi',
        'status',
    ];
}