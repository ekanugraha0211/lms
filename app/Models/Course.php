<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $table = 'course';
    protected $fillable = [
        'kode_mapel',
        'nama_mapel',
        'user_id',
    ];

    // Definisikan relasi jika perlu
    public function guru()
{
    return $this->belongsTo(User::class, 'user_id');  // Mengganti users_id menjadi user_id
}


}
