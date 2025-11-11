<?php

use App\Http\Controllers\Levelcontroller;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return 'selamat datang';
});
Route::get('/level',[Levelcontroller::class, 'index']);










