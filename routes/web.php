<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DealController;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('home');
});

Route::get('/deals',[DealController::class,'index']);
Route::get('/deal/create',[DealController::class,'create']);
Route::post('/deal/store',[DealController::class,'store']);
Route::get('/deal/edit/{deal:id}',[DealController::class,'edit']);
Route::post('/deal/update',[DealController::class,'update']);
Route::post('/deal/delete',[DealController::class,'delete']);


Route::get('/deal/{deal:id}/tasks',[TaskController::class,'index']);
Route::get('/deal/{deal:id}/task/create',[TaskController::class,'create']);
Route::post('/deal/{deal:id}/task/store',[TaskController::class,'store']);
Route::get('/task/edit/{task:id}',[TaskController::class,'edit']);
Route::post('/task/update/{task:id}',[TaskController::class,'update']);
Route::post('/task/delete',[TaskController::class,'delete']);