<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Jalankan migrasi untuk membuat tabel `users`.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
    $table->id();
    $table->string('name'); // ✅ tambahkan kolom ini
    $table->string('username')->unique();
    $table->string('email')->unique();
    $table->string('password');
    $table->unsignedBigInteger('kelas_id')->nullable();
    $table->enum('role', ['admin', 'guru', 'siswa']);
    $table->rememberToken(); // ✅ tambahkan juga ini
    $table->timestamps();
    $table->softDeletes();

    $table->foreign('kelas_id')
          ->references('id')
          ->on('kelas')
          ->onDelete('set null');
});

    }

    /**
     * Balikkan perubahan yang dilakukan oleh migrasi ini.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
