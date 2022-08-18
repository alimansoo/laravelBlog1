<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\ArticleController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\TagController;

Route::get('/', [HomeController::class,'index'])->name('index');
Route::get('/info', [HomeController::class,'info'])->name('info');
Route::get('/article/{article:slug}', [HomeController::class,'article'])->name('article');
Route::get('/category/{category:slug}', [HomeController::class,'category'])->name('category');
Route::get('/writer/{user:id}', [HomeController::class,'writer'])->name('writer');
Route::get('/tag/{tag:slug}', [HomeController::class,'tag'])->name('tag');

Route::prefix('admin')->middleware('auth')->group(function (){
    Route::get('/',[AdminController::class,'index'])->name('admin.dashbord');

    Route::resource('users',UserController::class,
        [
            'except' => ['show','destroy']
        ]
    );
    Route::put('users/{user}/active',[UserController::class,'active']);

    Route::resource('articles',ArticleController::class,
        [
            'except' => ['show']
        ]
    );
    Route::resource('categories',CategoryController::class,
        [
            'except' => ['show']
        ]
    );
    Route::resource('tags',TagController::class,
        [
            'except' => ['show']
        ]
    );
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
