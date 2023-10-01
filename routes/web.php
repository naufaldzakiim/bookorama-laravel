<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;

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
    return redirect()->route('books.list');
});

Route::get('books/list', [BooksController::class, 'list'])->name('books.list');
Route::get('books/add', [BooksController::class, 'viewAdd'])->name('books.viewAdd');
Route::post('books/add', [BooksController::class, 'add'])->name('books.add');
Route::get('books/detail/{id}', [BooksController::class, 'detail'])->name('books.detail');
Route::get('books/delete/{id}', [BooksController::class, 'delete'])->name('books.delete');
Route::post('books/review/{id}', [BooksController::class, 'review'])->name('books.review');
Route::get('books/update/{id}', [BooksController::class, 'viewUpdate'])->name('books.viewUpdate');
Route::post('books/update/{id}', [BooksController::class, 'update'])->name('books.update');
