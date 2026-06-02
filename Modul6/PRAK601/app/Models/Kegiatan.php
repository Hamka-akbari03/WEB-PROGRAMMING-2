<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Kegiatan extends Model
{
    protected $table = 'kegiatans';

    protected $fillable = [
        'profil_id',
        'kegiatan_judul',
        'kegiatan_deskripsi',
        'kegiatan_waktu',
        'kegiatan_dokumentasi',
        'kegiatan_kesan',
    ];

    public function profil(): BelongsTo
    {
        return $this->belongsTo(Profil::class);
    }
}
