<?php

namespace App\Http\Controllers;

use App\Models\Denda;
use Illuminate\Http\Request;

class nyendacontroller extends Controller
{
    public function nyenda(){
        $denda = Denda::all();
        return view("user.denda", compact("denda"));
    }
}
