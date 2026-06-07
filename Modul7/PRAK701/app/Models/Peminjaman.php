<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Buku;
use App\Models\Member;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjaman';

    protected $primaryKey = 'id_peminjaman';

    public $incrementing = true;

    protected $keyType = 'int';

    protected $fillable = [
        'tgl_pinjam',
        'tgl_kembali',
        'id_member',
        'id_buku',
    ];

    protected $casts = [
        'tgl_pinjam' => 'date',
        'tgl_kembali' => 'date',
    ];

    public function member()
    {
        return $this->belongsTo(Member::class, 'id_member', 'id_member');
    }

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'id_buku', 'id_buku');
    }
}