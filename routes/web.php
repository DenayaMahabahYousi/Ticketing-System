<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\AuthController;

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
    return view('login');
});

Route::resource('user', UserController::class);

Auth::routes();

Route::controller(AuthController::class)->group(function(){

    Route::get('login', 'index')->name('login');

    Route::get('logout', 'logout')->name('logout');

    Route::post('validate_login', 'validate_login')->name('auth.validate_login');

    Route::get('admin', 'dashboard')->name('dashboard');

    Route::get('super_admin', 'dashboard')->name('dashboard');

    Route::get('admin/software', [App\Http\Controllers\adminController::class, 'software'])->name('software');

    Route::get('admin/hardware', [App\Http\Controllers\adminController::class, 'hardware'])->name('hardware');

    Route::get('admin/forme', [App\Http\Controllers\adminController::class, 'show'])->name('show');

    Route::resource('admin', adminController::class);

    Route::get('super_admin/assigned', [App\Http\Controllers\SuperAdminController::class, 'show'])->name('show');

    Route::get('super_admin/hardware', [App\Http\Controllers\SuperAdminController::class, 'hardware'])->name('hardware');

    Route::get('super_admin/software', [App\Http\Controllers\SuperAdminController::class, 'software'])->name('software');

    Route::resource('super_admin', SuperAdminController::class);
});
