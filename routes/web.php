<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/pessoa', function () {
    return view('pessoa');
});

Route::get('/veiculo', function () {
    return view('veiculo');
});

Route::get('/revisao', function () {
    return view('revisao');
});

Route::get('/registro', function () {
    return view('registro');
});