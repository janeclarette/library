<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\SupplierController;
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
    return view('welcome');
});

Route::get('/author', [AuthorController::class, 'index'])->name('authors.index') ;
Route::get('/author/create', [AuthorController::class, 'create'])->name('authors.create') ;
Route::post('/author/store', [AuthorController::class, 'store'])->name('authors.store');
Route::get('/{id}/edit', [AuthorController::class, 'edit'])->name('authors.edit');
Route::put('/authors/{id}', [AuthorController::class, 'update'])->name('authors.update');
Route::get('/{id}/delete', [AuthorController::class, 'delete'])->name('authors.delete');


Route::get('/book', [BookController::class, 'index'])->name('books.index');
Route::get('/book/create', [BookController::class, 'create'])->name('books.create');
Route::post('/book', [BookController::class, 'store'])->name('books.store');
Route::get('/book/{book}/edit', [BookController::class, 'edit'])->name('books.edit');
Route::put('/books/{book}/update', [BookController::class, 'update'])->name('books.update');
Route::get('/books/{book}/delete', [BookController::class, 'delete'])->name('books.delete');


Route::get('/genre', [GenreController::class, 'index'])->name('genres.index');
Route::get('/genre/create', [GenreController::class, 'create'])->name('genres.create');
Route::post('/genre', [GenreController::class, 'store'])->name('genres.store');
Route::get('/genres/{genre}/edit', [GenreController::class, 'edit'])->name('genres.edit');
Route::put('/genres/{genre}', [GenreController::class, 'update'])->name('genres.update');
Route::get('/genre/{id}', [GenreController::class, 'delete'])->name('genres.delete');


Route::get('/suppliers', [SupplierController::class, 'index'])->name('suppliers.index');
Route::get('/suppliers/create', [SupplierController::class, 'create'])->name('suppliers.create');
Route::post('/suppliers', [SupplierController::class, 'store'])->name('suppliers.store');
Route::get('/suppliers/{supplier}/edit', [SupplierController::class, 'edit'])->name('suppliers.edit');
Route::put('/suppliers/{supplier}', [SupplierController::class, 'update'])->name('suppliers.update');
Route::delete('/suppliers/{supplier}', [SupplierController::class, 'delete'])->name('suppliers.delete');