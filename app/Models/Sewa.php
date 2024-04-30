<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sewa extends Model
{
    use HasFactory;

    protected $table = 'sewa'; 

    protected $fillable = [ 
        'penyewa',
        'kd_mobil',
        'id_supir',
        'tgl_pinjam',
        'tgl_kembali',
        'dp',
        'diskon',
        'total'
    ];

    public function getTotalAttribute(){
        return $this->dp - ($this->dp * $this->diskon / 100);
    }
}
