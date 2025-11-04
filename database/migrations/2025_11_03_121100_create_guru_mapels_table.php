<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('guru_mapels', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');  // guru
            $table->unsignedBigInteger('mapel_id'); // mata pelajaran
            $table->unsignedBigInteger('kelas_id'); // kelas
            $table->timestamps();

            // Relasi foreign key (optional tapi disarankan)
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('mapel_id')->references('id')->on('mapels')->onDelete('cascade');
            $table->foreign('kelas_id')->references('id')->on('kelas')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('guru_mapels');
    }
};
