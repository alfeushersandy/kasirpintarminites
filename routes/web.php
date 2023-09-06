<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\ReimbursementController;
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

Route::group(['prefix' => 'kasirpintar', 'as' => 'kasirpintar.','middleware' => ['auth']], function(){
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
    Route::resource('/karyawan', KaryawanController::class);
    Route::resource('/reimburse', ReimbursementController::class);
    Route::get('/reimburse/{rembes}/approve', [ReimbursementController::class, 'approve'])->name('rembes.approve');
    Route::get('/reimburse/{rembes}/reject', [ReimbursementController::class, 'rejected'])->name('rembes.reject');
});
