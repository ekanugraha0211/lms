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
        Schema::create('course', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('name'); // Nama mata pelajaran
            $table->text('description')->nullable(); // Deskripsi mata pelajaran
            $table->unsignedBigInteger('users_id'); // Relasi ke guru di tabel users
            $table->timestamps();

            // Foreign key ke tabel users
            $table->foreign('users_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade'); // Jika guru dihapus, course ikut terhapus
        });
    }

    /**
     * Rollback migrasi.
     */
    public function down(): void
    {
        Schema::dropIfExists('course');
    }
};
