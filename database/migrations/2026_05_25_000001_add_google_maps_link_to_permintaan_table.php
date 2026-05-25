<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('permintaan', function (Blueprint $table) {
            if (! Schema::hasColumn('permintaan', 'google_maps_link')) {
                $table->string('google_maps_link', 700)->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('permintaan', function (Blueprint $table) {
            if (Schema::hasColumn('permintaan', 'google_maps_link')) {
                $table->dropColumn('google_maps_link');
            }
        });
    }
};
