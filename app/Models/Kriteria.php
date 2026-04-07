<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    protected $table = 'tabel_kriteria';
    protected $primaryKey = 'id_kriteria';
    protected $guarded = [];


    public function penilaian()
    {
        return $this->hasMany(Penilaian::class, 'id_kriteria');
    }
}
