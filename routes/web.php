<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;


Route::get('/', function () {
    return view('welcome');
})->name('welcome');


//Auth
Route::GET('/login', [AuthController::class, 'login'])->name('auth.login');
Route::POST('/login', [AuthController::class, 'customLogin'])->name('auth.custom.login');
Route::GET('/register', [AuthController::class, 'register'])->name('auth.register');
Route::GET('logout', [AuthController::class, 'logout'])->name('auth.logout');

### ADMIN ###
Route::prefix('admin')->middleware('IsAdmin')->group(function () {
    Route::GET('/', [AdminController::class, 'index'])->name('admin.index');
    ### USER ###
    Route::GET('/user', [UserController::class, 'index'])->name('user.index');
    Route::GET('/create-user', [UserController::class, 'create'])->name('user.create');
    Route::POST('/store-user', [UserController::class,'store'])->name('user.store');
    Route::GET('/edit-user/{user_id}', [UserController::class, 'edit'])->name('user.edit');
    Route::POST('/update-user/{user_id}', [UserController::class, 'update'])->name('user.update');
    Route::POST('/delete-user/{user_id}', [UserController::class, 'destroy'])->name('user.destroy');
});