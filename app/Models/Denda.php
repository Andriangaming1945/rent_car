<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Denda extends Model
{
    use HasFactory;

    protected $table = 'denda'; 

    protected $fillable = [ 
        'keterlambatan',
        'kerusakan',
        'kd_mobil',
        'total_denda'
    ];

    protected $casts = [
        'keterlambatan' => 'integer',
        'kerusakan' => 'integer',
        
    ];

    public function calculate(){

        $keterlambatan = $this->keterlambatan;
        $kerusakan = $this->kerusakan;

        $tarifketerlambatan = 50;
        $biayakerusakan = 200;

        $total_denda = ($keterlambatan * $tarifketerlambatan) + ($kerusakan * $biayakerusakan);

        $this->total_denda = $total_denda;
        $this->save();

        return $total_denda;
    }

}
