<?php

use App\Http\Controllers\AgoraTokenController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//generate agora token
Route::get('/agora/token', AgoraTokenController::class . '@generate');
