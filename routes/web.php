<?php

use App\Http\Controllers\MoviesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

/*
Aula 1
*/

/**
 *Route::match(['put','get', 'post'], '/usuarios', [UsersController::class, 'index']); // restringe os metodos aceitados para execução
 *Route::any('/usuarios', [UsersController::class, 'index']); // aceita qualquer metodo para execução
 *Route::view('/welcome', 'welcome', ['nome' => 'aberto', 'email' => 'email@email])
 *
 *
 */
/***
 * * Aula 2 *
 *
 */
/*Route::get('search/{search}', function ($search) {
    return $search;
})->where('search', '.*');
*/
/** Aulas 3 a 7
 ** Route::get('/usuario/{user}', [UsersController::class, 'show'])
 *    ->missing(function (){
 *       return redirect()->route('user.index');
 *   })
 *   ->name('user.show');
 *Route::fallback(function (){
 *    return redirect()->route('user.index');
 *});
 *
 *Route::prefix('usuarios')->name('user.')
 *    ->controller(UsersController::class)
 *    //->middleware('auth')
 **   ->group(function () {
 **       Route::get('/adicionar', 'create')->name('create');
 **      Route::post('/adicionar','store')->name('store');
 *      Route::get('/','index')->name('index');
 *      Route::get('/{user}','show')->name('show');
 *      Route::get('/edit/{user}', 'edit')->name('edit');
 *      Route::put('/update/{user}','update')->name('update');
 *      Route::delete('/delete/{user}', 'destroy')->name('destroy');
 *});
 **/
/** Aula 8 e 9 Rotas Resource */

Route::fallback(function () {
    dd('Esta rota não existe!!!!');
});
/**
 *
 *
* Route::resource('/usuarios', UsersController::class);*

* Route::apiResource('/usuarios.posts', UsersController::class)->shallow(); // shallow remove o último parâmetroe
 *
*/

//Route::resource('/user', UsersController::class)->middleware(['MyFirstMiddleware:admin']);
Route::get('/filmes', MoviesController::class);

Route::resource('/user', UsersController::class);

Route::get('/new-post/user/{id}',[PostsController::class, 'create'])->name('posts.create');
Route::post('/store',[PostsController::class, 'store'])->name('posts.store');
