<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pendaftaran_siswas', function (Blueprint $table) {
            // Tambahkan kolom status_pendaftaran
            if (!Schema::hasColumn('pendaftaran_siswas', 'status_pendaftaran')) {
                $table->string('status_pendaftaran')->default('menunggu')->after('asal_sekolah');
            }
        });
    }

    public function down(): void
    {
        Schema::table('pendaftaran_siswas', function (Blueprint $table) {
            if (Schema::hasColumn('pendaftaran_siswas', 'status_pendaftaran')) {
                $table->dropColumn('status_pendaftaran');
            }
        });
    }
};
