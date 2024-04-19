<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

Route::get('/',[BlogController::class,'index']);
Route::post('/store',[BlogController::class,'store']);
Route::get('/show/{blog}',[BlogController::class,'show']);
