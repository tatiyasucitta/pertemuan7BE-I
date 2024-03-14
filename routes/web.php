<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BookCategoryController;
use App\Http\Controllers\UserController;
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

Route::middleware(['auth'])->group(function(){
    Route::get('/',[BookController::Class, 'view'])->name('viewallbook');

    Route::prefix('admin')->middleware(['isAdmin'])->group(function(){
        Route::controller(BookController::class)->group(function(){
            Route::get('/addbook','createform')->name('createform');
            Route::post('/created', 'createbook')->name('create');
            Route::get('/editBook/{id}', 'editform')->name('editform');
            Route::patch('/edited/{id}', 'edit')->name('edited');
            Route::delete('/delete/{id}', 'delete')->name('delete');
        });

        Route::controller(AuthorController::class)->group(function(){
            Route::get('/create-new-author', 'createform')->name('create.author.form');
            Route::post('/create-author', 'create')->name('create.author');
        });
        
        Route::controller(CategoryController::class)->group(function(){
            Route::get('/create-category-form', 'createform')->name('create.cat.form');
            Route::post('/create-category', 'create')->name('create.cat');
        });
        
        Route::controller(BookCategoryController::class)->group(function(){
            Route::get('/add-category-form/{id}','addform')->name('catform');
            Route::post('/add-category/{id}', 'addcategory')->name('cat.add');
        });
    });
});


Route::controller(UserController::class)->group(function(){
    Route::get('/register-form', 'registerForm')->name('register');
    Route::post('/registered', 'create')->name('registered');
    Route::get('/login', 'login')->name('login');
    Route::post('/logedin', 'logedin')->name('logedin');
});