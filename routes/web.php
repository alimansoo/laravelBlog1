<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function (){
    Route::get('/',function (){
        return 'You are in admin Dashboard';
    })->name('admin.dashbord');

    Route::get('/users',function (){
        return 'You are in admin list users';
    })->name('admin.users');

    Route::get('/products',function (){
        return view('d');
    })->name('admin.products');

    Route::get('/categories',function (){
        return 'You are in admin list categories';
    })->name('admin.categories');
});
