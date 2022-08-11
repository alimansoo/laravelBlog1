<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\ArticleController;
use App\Http\Controllers\admin\CategoryController;

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

Route::get('/', [HomeController::class,'home'])->name('home');
Route::get('/article/{article:slug}', [HomeController::class,'article'])->name('article');
Route::get('/category/{category:slug}', [HomeController::class,'category'])->name('category');

Route::prefix('admin')->group(function (){
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
});
