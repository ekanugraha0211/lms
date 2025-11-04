<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMapelsTable extends Migration
{
    /**
     * Jalankan migrasi untuk membuat tabel `mapels`.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mapels', function (Blueprint $table) {
            $table->id();  // Kolom ID sebagai primary key
            $table->string('kode_mapel')->unique();  // Kolom kode mata pelajaran yang unik
            $table->string('nama_mapel');  // Kolom nama mata pelajaran
            $table->unsignedBigInteger('users_id');  // Kolom user_id untuk relasi dengan tabel users
            $table->timestamps();  // Kolom created_at dan updated_at

            // Definisikan foreign key untuk users_id yang merujuk ke tabel users
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Balikkan perubahan yang dilakukan oleh migrasi ini.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mapels');
    }
}
