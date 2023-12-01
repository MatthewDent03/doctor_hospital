<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Admin\DoctorController as AdminDoctorController;
use App\Http\Controllers\User\DoctorController as UserDoctorController;
use App\Http\Controllers\Admin\HospitalController as AdminHospitalController;
use App\Http\Controllers\User\HospitalController as UserHospitalController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout'); // Add this line for logout
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    
    // Created a route to the resource folder to access the controller class to allow all functions within and views in resources to be active with one another
    Route::resource('/doctors', DoctorController::class);
    Route::resource('/admin/doctors', AdminDoctorController::class)->names('admin.doctors');
    Route::resource('/user/doctors', UserDoctorController::class)->middleware(['auth'])->names('user.doctors')->only(['index', 'show']);
    Route::resource('/admin/hospitals', AdminHospitalController::class)->middleware(['auth'])->names('admin.hospitals');
    Route::resource('/user/hospitals', UserHospitalController::class)->middleware(['auth'])->names('user.hospitals')->only(['index', 'show']);
});