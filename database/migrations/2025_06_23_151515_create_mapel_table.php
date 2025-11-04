<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMapelTable extends Migration
{
    /**
     * Jalankan migrasi untuk membuat tabel `mapel`.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mapel', function (Blueprint $table) {
            $table->id();  // Kolom ID sebagai primary key
            $table->string('kode_mapel')->unique();  // Kode Mata Pelajaran (unik)
            $table->string('nama_mapel');  // Nama Mata Pelajaran
            $table->timestamps();  // Kolom created_at dan updated_at
        });
    }

    /**
     * Balikkan perubahan yang dilakukan oleh migrasi ini.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mapel');
    }
}
