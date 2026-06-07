<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Peminjaman;

class Member extends Model
{
    use HasFactory;

    protected $table = 'member';

    protected $primaryKey = 'id_member';

    public $incrementing = true;

    protected $keyType = 'int';

    protected $fillable = [
        'nama_member',
        'nomor_member',
        'alamat',
        'tgl_mendaftar',
        'tgl_terakhir_bayar',
    ];

    protected $casts = [
        'tgl_mendaftar' => 'datetime',
        'tgl_terakhir_bayar' => 'date',
    ];

    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class, 'id_member', 'id_member');
    }
}