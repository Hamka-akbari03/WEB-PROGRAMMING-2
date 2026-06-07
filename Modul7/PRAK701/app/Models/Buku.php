<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'buku';

    protected $primaryKey = 'id_buku';

    public $incrementing = true;

    protected $keyType = 'int';

    protected $fillable = [
        'judul_buku',
        'penulis',
        'penerbit',
        'tahun_terbit',
    ];
}