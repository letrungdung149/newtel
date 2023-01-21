<?php

use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auths.login');
});


Route::prefix('admin')->group(function () {
    Route::get(
        'dashboard',
        function () {
            return view('layouts.app');
        }
    );
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/user-create', [UserController::class, 'create'])->name('user-create');
    Route::post('/user-store',[UserController::class,'store'])->name('user-store');
    Route::get('/user-edit/{id}',[UserController::class,'edit'])->name('user-edit');
    Route::post('/user-update/{id}',[UserController::class,'update'])->name('user-update');
    Route::get('/user-delete/{id}',[UserController::class,'delete'])->name('user-delete');
});

Route::prefix('auth')->group(function () {
    Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
    Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
    Route::get('/register', [AuthController::class, 'storeRegister'])->name('auth.register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.store');
});