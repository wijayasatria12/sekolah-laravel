<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi.
     */
    public function up(): void
    {
        Schema::create('websites', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable();
            $table->string('namasekolah');
            $table->string('judulkecil')->nullable();
            $table->text('alamat')->nullable();
            $table->string('no_wa', 20)->nullable();
            $table->string('email')->nullable();
            $table->longText('sejarah')->nullable();
            $table->longText('visi')->nullable();
            $table->longText('misi')->nullable();
            $table->text('embeded_maps')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Balikkan migrasi.
     */
    public function down(): void
    {
        Schema::dropIfExists('websites');
    }
};
