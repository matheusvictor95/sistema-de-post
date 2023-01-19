<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
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

Route::middleware(['auth'])->group(function () {
    Route::post('posts/search', [PostController::class, 'search'])->name('posts.search');
    Route::get('posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::get('posts/edit/{id}', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('posts/{id}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');
    Route::get('posts/{id}', [PostController::class, 'show'])->name('posts.show');
    Route::post('posts/store', [PostController::class, 'store'])->name('posts.store');
    Route::get('posts/', [PostController::class, 'index'])->name('posts.index')->middleware('auth');

    //rotas de Categoria
    Route::post('categorias/search', [CategoriaController::class, 'search'])->name('categoria.search');
    Route::get('categorias/create', [CategoriaController::class, 'create'])->name('categoria.create');
    Route::get('categorias/index', [CategoriaController::class, 'index'])->name('categoria.index');
    Route::post('categorias/store', [CategoriaController::class, 'store'])->name('categoria.store');
});



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
