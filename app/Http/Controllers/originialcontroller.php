<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Sewa;
use App\Models\User;
use Illuminate\Http\Request;

class originialcontroller extends Controller
{
    public function user(){
        $posts = Post::all();
        $sewa = Sewa::all();
        $diskon = 0.1;
        $dp = 1000000;
        return view('user.user', compact('posts', 'dp', 'sewa', 'diskon'));
    }

    public function admin(){
        $posts = Post::latest()->paginate(5);    
        return view('admin.admin', compact('posts'));
    }
}
