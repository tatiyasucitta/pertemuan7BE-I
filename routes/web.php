<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

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

Route::get('/', [BookController::class, 'view'])->name('viewallbook');
Route::get('/addbook', [BookController::class, 'createform'])->name('createform');

Route::post('/created', [BookController::class, 'createbook'])->name('create');
Route::get('/editBook/{id}', [BookController::class, 'editform'])->name('editform');
Route::patch('/edited/{id}', [BookController::class, 'edit'])->name('edited');
Route::delete('/delete/{id}', [BookController::class, 'delete'])->name('delete');
