<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Wali;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa';
    protected $fillable = ['nama', 'nim'];

    public function wali()
    {
        return $this->hasOne(Wali::class, 'id_mahasiswa');
    }

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'id_dosen');
    }

    public function hobi(){
        return $this->belongsToMany(Hobi::class, 'mahasiswa_hobi', 'id_mahasiswa', 'id_hobi');
    }
}
