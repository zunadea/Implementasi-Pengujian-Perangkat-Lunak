<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermintaanModel extends Model
{
    use HasFactory;

    // Nama tabel harus tepat sama dengan yang ada di file migration
    protected $table = 'permintaan'; 

    // Daftar kolom yang boleh diisi (mass assignment)
    protected $fillable = [
        'nama_barang', 
        'kategori', 
        'jumlah', 
        'deskripsi', 
        'urgensi', 
        'lokasi_hub'
    ];
}