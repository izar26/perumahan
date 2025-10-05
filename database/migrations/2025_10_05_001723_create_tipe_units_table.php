<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tipe_units', function (Blueprint $table) {
            $table->id();
            $table->string('nama_tipe');
            $table->string('slug')->unique();
            $table->bigInteger('harga');
            $table->integer('luas_tanah');
            $table->integer('luas_bangunan');
            $table->text('deskripsi_singkat');
            $table->text('deskripsi_lengkap');
            $table->string('denah_path')->nullable(); // path gambar denah
            $table->string('thumbnail_path'); // path gambar utama
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tipe_units');
    }
};