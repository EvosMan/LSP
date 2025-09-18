<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    protected $fillable = [
        'nomor_surat',
        'kategori_id',
        'judul',
        'file',
        'waktu_pengarsipan',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
