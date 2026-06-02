<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Profil extends Model
{
    // Mengunci nama tabel yang ada di database MySQL
    protected $table = 'profils'; 

    // Mendaftarkan kolom yang diizinkan untuk dikelola
    protected $fillable = [
        'nama_lengkap', 'nim', 'asal_prodi', 'hobi', 'skill', 'foto_profil',
    ];

    public function kegiatans(): HasMany
    {
        return $this->hasMany(Kegiatan::class);
    }
}