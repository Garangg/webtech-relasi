<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Hobi extends Model
{
    use HasFactory;

    protected $table = 'hobi';
    protected $fillable = ['hobi'];

    public function mahasiswa(){
        return $this->belongsToMany(Mahasiswa::class ,'mahasiswa_hobi','id_hobi','id_mahasiswa');
    }
}
