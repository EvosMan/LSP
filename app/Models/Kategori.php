<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $fillable = [
        'nama',
        'keterangan',
    ];

    public function surats()
    {
        return $this->hasMany(Surat::class);
    }
}
