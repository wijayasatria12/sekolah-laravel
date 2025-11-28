<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pendaftaran_siswas', function (Blueprint $table) {
            $table->string('nama_ayah')->nullable();
            $table->string('nama_ibu')->nullable();
            $table->string('asal_sekolah')->nullable();
            $table->string('pas_foto')->nullable();   // path file foto
            $table->string('scan_skhun')->nullable(); // path file SKHUN
        });
    }

    public function down(): void
    {
        Schema::table('pendaftaran_siswas', function (Blueprint $table) {
            $table->dropColumn(['nama_ayah', 'nama_ibu', 'asal_sekolah', 'pas_foto', 'scan_skhun']);
        });
    }
};
