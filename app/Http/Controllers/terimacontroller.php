<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Sewa;
use Illuminate\Http\Request;

class terimacontroller extends Controller
{
    public function terima(){
        $sewa = Sewa::all();
        $diskon = 0.1;
        $dp = 1000000;
        return view("user.terima", compact('sewa','diskon', 'dp'));
    }
}
