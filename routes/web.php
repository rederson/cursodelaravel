<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route:: redirect('/', 'login');
Route::get('/cadastro', [AuthController::class, 'formRegister'])->name('formRegister');
Route::get('/login', [AuthController::class, 'formLogin'])->name('login');
Route::get('/login', [AuthController::class, 'login'])->name('post.login');

Route::middleware('auth')
    ->prefix('usuarios')
    ->controller(UsersController::class)
    ->name('users.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/novo-usuario', 'create')->name('create');
        Route::post('/novo-usuario', 'store')->name('store')->withoutMiddleware('auth');
        Route::get('/editar/{id}', 'edit')->name('edit');
        Route::put('/editar/{id}', 'update')->name('update');
        Route::get('/{id}/detalhes', 'show')->name('show');
        Route::get('/{id}/endereco', 'address')->name('address');
        Route::get('/{id}/posts', 'posts')->name('posts');
        Route::get('/deletar/{id}', 'destroy')->name('destroy');

});

Route::get('/login', [LoginController::class,'login'])->name('login');

//Auth::routes(['login' => false]); // remove link do scafold

