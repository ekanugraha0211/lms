<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswaTable extends Migration
{
    /**
     * Jalankan migrasi untuk membuat tabel `siswa`.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->id();  // Kolom ID sebagai primary key
            $table->unsignedBigInteger('user_id');  // Relasi ke tabel users
            $table->string('nis')->unique();  // Nomor Induk Siswa
            $table->string('nisn')->unique();  // Nomor Induk Siswa Nasional
            $table->string('telepon')->nullable();  // Telepon siswa (nullable)
            $table->text('alamat')->nullable();  // Alamat siswa (nullable)
            $table->date('tgl_lahir');  // Tanggal lahir siswa
            $table->unsignedBigInteger('kelas_id');  // Relasi ke tabel kelas
            $table->enum('gender', ['L', 'P']);  // Jenis kelamin siswa (L=Laki-laki, P=Perempuan)
            $table->timestamps();  // Kolom created_at dan updated_at

            // Definisikan foreign key untuk user_id yang merujuk ke tabel users
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            // Definisikan foreign key untuk kelas_id yang merujuk ke tabel kelas
            $table->foreign('kelas_id')->references('id')->on('kelas')->onDelete('cascade');
        });
    }

    /**
     * Balikkan perubahan yang dilakukan oleh migrasi ini.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siswa');
    }
}
