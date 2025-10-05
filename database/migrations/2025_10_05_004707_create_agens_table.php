<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // database/migrations/..._create_agens_table.php
public function up(): void
{
    Schema::create('agens', function (Blueprint $table) {
        $table->id();
        $table->string('nama_agen');
        $table->string('jabatan')->default('Marketing Executive');
        $table->string('nomor_wa'); // Dibuat string untuk format 628...
        $table->string('foto_path');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agens');
    }
};
