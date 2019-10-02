<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'soswa';

    protected $guarded = [];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}
