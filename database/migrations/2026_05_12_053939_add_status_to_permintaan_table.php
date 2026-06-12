<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('permintaan', function (Blueprint $table) {
            // Cek dulu, kalau belum ada baru buat user_id
            if (!Schema::hasColumn('permintaan', 'user_id')) {
                $table->unsignedBigInteger('user_id')->after('id')->nullable();
            }
            
            // Cek dulu, kalau belum ada baru buat status
            if (!Schema::hasColumn('permintaan', 'status')) {
                $table->string('status')->default('Pending')->after('lokasi_hub');
            }
        });
    }

    public function down(): void
    {
        Schema::table('permintaan', function (Blueprint $table) {
            // Hapus kolom hanya jika kolom tersebut ada
            if (Schema::hasColumn('permintaan', 'user_id')) {
                $table->dropColumn('user_id');
            }
            if (Schema::hasColumn('permintaan', 'status')) {
                $table->dropColumn('status');
            }
        });
    }
};