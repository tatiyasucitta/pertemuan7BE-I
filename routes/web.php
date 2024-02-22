<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BookCategoryController;
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

Route::get('/create-new-author', [AuthorController::class, 'createform'])->name('create.author.form');
Route::post('/create-author', [AuthorController::class, 'create'])->name('create.author');

Route::get('/create-category-form', [CategoryController::class, 'createform'])->name('create.cat.form');
Route::post('/create-category', [CategoryController::class, 'create'])->name('create.cat');

Route::get('/add-category-form/{id}', [BookCategoryController::class, 'addform'])->name('catform');
Route::post('/add-category/{id}', [BookCategoryController::class, 'addcategory'])->name('cat.add');
