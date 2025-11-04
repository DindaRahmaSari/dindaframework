<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return 'selamat datang';
});
Route::get('/kontak', function () {
    return view('kontak') ;
});

Route::get('/helo', function () {
    return 'helo world';
});

Route::get('/about', function () {
    return 'NIM = 23.51.0043, Nama = Dinda Rahma Sari';
});


Route::get('/user/{name?}', function($name='paijo') {
    return 'Halo Nama Saya '.$name;
});

Route::get('/user/{name}', function($name) {
    return 'Halo Nama Saya '.$name;
});

Route::get('/posts/{post}/comments/{comment}', function
($postId, $commentId) {
return 'Pos ke-'.$postId." Komentar ke-: ".$commentId;
});








