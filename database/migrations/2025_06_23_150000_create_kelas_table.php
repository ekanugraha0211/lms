<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelasTable extends Migration
{
    /**
     * Jalankan migrasi untuk membuat tabel `kelas`.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelas', function (Blueprint $table) {
            $table->id();  // Kolom ID sebagai primary key
            $table->string('kode_kelas')->unique();  // Kode Kelas (unik)
            $table->string('nama_kelas');  // Nama Kelas
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
        Schema::dropIfExists('kelas');
    }
}
