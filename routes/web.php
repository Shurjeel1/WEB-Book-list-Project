<?php

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
Route::get('/books', [App\Http\Controllers\BooksController::class, 'index'])->name('books.index');
Route::get('/books/create', [App\Http\Controllers\BooksController::class, 'create'])->name('books.create');
Route::post('/books/store', [App\Http\Controllers\BooksController::class, 'store'])->name('books.store');
Route::post('/books/destroy', [App\Http\Controllers\BooksController::class, 'destroy'])->name('books.destroy');
Route::get('/books/show', [App\Http\Controllers\BooksController::class, 'show'])->name('books.show');
Route::get('/books/edit', [App\Http\Controllers\BooksController::class, 'edit'])->name('books.edit');
Route::get('/books/update', [App\Http\Controllers\BooksController::class, 'update'])->name('books.update');
