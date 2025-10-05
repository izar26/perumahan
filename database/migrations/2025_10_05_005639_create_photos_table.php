<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // database/migrations/..._create_photos_table.php
public function up(): void
{
    Schema::create('photos', function (Blueprint $table) {
        $table->id();
        // Ini adalah kunci penghubungnya
        $table->foreignId('tipe_unit_id')->constrained()->onDelete('cascade');
        $table->string('path');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('photos');
    }
};
