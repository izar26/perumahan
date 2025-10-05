<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // database/migrations/..._create_pesans_table.php
public function up(): void
{
    Schema::create('pesans', function (Blueprint $table) {
        $table->id();
        $table->string('nama');
        $table->string('kontak'); // Bisa diisi email atau nomor HP
        $table->string('subjek');
        $table->text('isi_pesan');
        $table->boolean('sudah_dibaca')->default(false);
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesans');
    }
};
