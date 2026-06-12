<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PermintaanModel extends Model
{
    use HasFactory;

    /**
     * Nama tabel di database.
     * Pastikan ini sesuai dengan migration Anda.
     */
    protected $table = 'permintaan';

    /**
     * Daftar kolom yang boleh diisi (mass assignment).
     * Saya tambahkan 'user_id' dan 'status' ke dalam list ini.
     */
    protected $fillable = [
        'user_id',      // ID penerima barang
        'nama_barang', 
        'kategori', 
        'jenis_penerima',
        'jumlah', 
        'deskripsi', 
        'urgensi', 
        'lokasi_hub',
<<<<<<< HEAD
        'status'        // Status 'Pending' atau 'Disetujui'
=======
        'google_maps_link',
        'status',
        'fulfilled_by_user_id',
        'fulfilled_at',
        'feedback_photo',
        'feedback_nama_barang',
        'feedback_jumlah',
        'feedback_note',
        'feedback_at',
>>>>>>> zunadeafiturv1
    ];

    /**
     * RELASI: Setiap permintaan barang dimiliki oleh satu User (Penerima).
     * Relasi ini sangat penting agar Donatur bisa melihat nama si peminta barang.
     */
    public function user(): BelongsTo
    {
        /**
         * 'user_id' adalah foreign key yang ada di tabel 'permintaan'.
         */
        return $this->belongsTo(User::class, 'user_id');
    }
<<<<<<< HEAD
}
=======

    public function fulfilledBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'fulfilled_by_user_id');
    }
}
>>>>>>> zunadeafiturv1
