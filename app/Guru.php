<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $table ='guru';

    protected $guarded = [];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}
