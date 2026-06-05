<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('permintaan', function (Blueprint $table) {
            if (! Schema::hasColumn('permintaan', 'fulfilled_by_user_id')) {
                $table->unsignedBigInteger('fulfilled_by_user_id')->nullable()->after('status');
            }

            if (! Schema::hasColumn('permintaan', 'fulfilled_at')) {
                $table->timestamp('fulfilled_at')->nullable()->after('fulfilled_by_user_id');
            }

            if (! Schema::hasColumn('permintaan', 'feedback_photo')) {
                $table->string('feedback_photo')->nullable()->after('fulfilled_at');
            }

            if (! Schema::hasColumn('permintaan', 'feedback_nama_barang')) {
                $table->string('feedback_nama_barang')->nullable()->after('feedback_photo');
            }

            if (! Schema::hasColumn('permintaan', 'feedback_jumlah')) {
                $table->integer('feedback_jumlah')->nullable()->after('feedback_nama_barang');
            }

            if (! Schema::hasColumn('permintaan', 'feedback_note')) {
                $table->text('feedback_note')->nullable()->after('feedback_jumlah');
            }

            if (! Schema::hasColumn('permintaan', 'feedback_at')) {
                $table->timestamp('feedback_at')->nullable()->after('feedback_note');
            }
        });
    }

    public function down(): void
    {
        Schema::table('permintaan', function (Blueprint $table) {
            foreach ([
                'feedback_at',
                'feedback_note',
                'feedback_jumlah',
                'feedback_nama_barang',
                'feedback_photo',
                'fulfilled_at',
                'fulfilled_by_user_id',
            ] as $column) {
                if (Schema::hasColumn('permintaan', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};
