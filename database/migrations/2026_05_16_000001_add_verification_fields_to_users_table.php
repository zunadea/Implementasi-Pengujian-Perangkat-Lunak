<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (! Schema::hasColumn('users', 'verification_status')) {
                $table->string('verification_status')->default('unverified')->after('role');
            }

            if (! Schema::hasColumn('users', 'verification_username')) {
                $table->string('verification_username')->nullable()->after('verification_status');
            }

            if (! Schema::hasColumn('users', 'verification_nik')) {
                $table->string('verification_nik')->nullable()->after('verification_username');
            }

            if (! Schema::hasColumn('users', 'verification_nik_name')) {
                $table->string('verification_nik_name')->nullable()->after('verification_nik');
            }

            if (! Schema::hasColumn('users', 'verification_submitted_at')) {
                $table->timestamp('verification_submitted_at')->nullable()->after('verification_nik_name');
            }
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $columns = [
                'verification_submitted_at',
                'verification_nik_name',
                'verification_nik',
                'verification_username',
                'verification_status',
            ];

            foreach ($columns as $column) {
                if (Schema::hasColumn('users', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};
