<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return ['clave1'=>'valor1'];
    //return $request->user();
});//->middleware('auth:sanctum');
