<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\DoctorController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/doctors/{doctor}',[DoctorController::class,'index'])->name('doctors.index');
Route::get('/doctors/{doctor}',[DoctorController::class,'show'])->name('doctors.show');
Route::get('/doctors/{doctor}',[DoctorController::class,'create'])->name('doctors.create');
