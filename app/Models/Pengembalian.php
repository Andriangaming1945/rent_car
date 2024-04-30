<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    use HasFactory;

    protected $table = 'pengembalian'; 

    protected $fillable = [ 
        'penyewa',
        'kd_mobil',
        'id_supir',
        'tgl_pinjam',
        'tgl_kembali',
        'diskon',
        'total'
    ];

    public function getTotalAttribute()
    {
        return $this->total;
    }
}
