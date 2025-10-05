<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // database/migrations/..._create_fasilitas_table.php
public function up(): void
{
    Schema::create('fasilitas', function (Blueprint $table) {
        $table->id();
        $table->string('nama_fasilitas');
        $table->string('icon_path'); // Path untuk gambar/ikon fasilitas
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fasilitas');
    }
};
