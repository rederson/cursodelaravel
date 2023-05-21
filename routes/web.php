<?php

use App\Http\Controllers\UsersController;
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

Route::get('/usuarios/adicionar',[UsersController::class, 'create'])->name('user.create');
Route::post('/usuarios/adicionar',[UsersController::class, 'store'])->name('user.store');
Route::get('/usuarios',[UsersController::class,'index'])->name('user.index');
Route::get('/usuario/{id}',[UsersController::class,'show'])->name('user.show');
Route::get('/usuario/edit/{id}', [UsersController::class,'edit'])->name('user.edit');
Route::put('usuario/update/{id}', [UsersController::class, 'update'])->name('user.update');
Route::delete('usuario/delete/{id}', [UsersController::class, 'destroy'])->name('user.destroy');
