<?php

use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\AdminController;
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

Route::get('/admin',[AdminController::class, 'create'])->name('admin.admin');

Route::post('/admin', [AdminController::class,  'store'])->name('admin.store');

Route::get('/admin/posts', [PostController::class, 'index'])->name('admin.posts.index');
Route::get('/admin/posts/create', [PostController::class, 'create'])->name('admin.posts.create');
Route::post('/admin/posts', [PostController::class, 'store'])->name('admin.posts.store');
Route::get('/admin/posts/{id}', [PostController::class, 'edit'])->name('admin.posts.edit');
// update route
Route::post('/admin/posts/{id}', [PostController::class, 'edit'])->name('admin.posts.update');

Route::delete('/admin/posts/{id}', [PostController::class, 'destroy'])->name('admin.posts.destroy');
