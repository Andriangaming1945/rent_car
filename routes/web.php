<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\postcontroller;
use App\Http\Controllers\Sewacontroller;
use App\Http\Controllers\dendacontroller;
use App\Http\Controllers\logincontroller;
use App\Http\Controllers\nyendacontroller;
use App\Http\Controllers\nyewacontroller;
use App\Http\Controllers\terimacontroller;
use App\Http\Controllers\originialcontroller;
use App\Http\Controllers\pengembaliancontroller;
use App\Http\Controllers\Registercontroller;
use App\Models\Register;



Route::middleware(['guest'])->group(function(){
  Route::get('/', [logincontroller::class, 'index'])->name('login');
Route::post('/', [logincontroller::class, 'login']);
Route::get('/yuhu', [logincontroller::class, "yuhu"])->name("yuhu");
Route::post('/register', [logincontroller::class, "register"])->name("register");
});



Route::middleware(['auth'])->group(function(){
    Route::get('/user', [originialcontroller::class, 'user'])->middleware('UserAkses:user')->name('user');
    Route::get('/admin', [originialcontroller::class, 'admin'])->middleware('UserAkses:admin')->name("admin");
    Route::get('/logout', [logincontroller::class, 'logout'])->name('logout');
    Route::resource('/posts', \App\Http\Controllers\postcontroller::class);

    //sewa
    Route::resource("/sewa", \App\Http\Controllers\Sewacontroller::class);

    //Pengembalian
    Route::resource('/pengembalian', \App\Http\Controllers\pengembaliancontroller::class);

    //denda
    Route::resource('/denda', \App\Http\Controllers\dendacontroller::class);

    //sewa user view
    Route::resource('/nyewa', \App\Http\Controllers\nyewacontroller::class);

    Route::get('/nyewa', [nyewacontroller::class, 'index'])->name('nyewa');

      //terima user view
    Route::get("/terima", [terimacontroller::class, "terima"])->name("terima");

    //denda
    Route::get('/nyenda', [nyendacontroller::class, "nyenda"])->name("nyenda");

});
