<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController ;
use App\Http\Controllers\PostController ;
use App\Http\Controllers\CommentController ;
use App\Http\Controllers\AuthController ;
use App\Http\Controllers\UserController ;
use App\Models\User ;
use App\Models\Post ;

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

Route::get('/', [HomeController::class,'index'])->name('home');

Route::prefix('user')->name('user.')->middleware('Authentication')->group(function () {
  Route::get('/dashboard', [UserController::class,'dashboard'])->name('dashboard');
  Route::post('/profile', [UserController::class,'profile'])->name('profile');
  Route::post('/name',[UserController::class,'name'])->name('name');
  Route::post('/delete',[UserController::class,'delete'])->name('delete');
});


Route::prefix('post')->name('post.')->middleware('Authentication')->group(function () {
  Route::get('/create',[PostController::class,'create'])->name('create');
  Route::post('/store',[PostController::class,'store'])->name('store');
  Route::middleware('Authorization')->group( function () {
    Route::get('/{post}/edit',[PostController::class,'edit'])->name('edit');
    Route::post('/{post}/update',[PostController::class,'update'])->name('update');
    Route::get('/{post}/delete',[PostController::class,'destroy'])->name('delete');
  });
});

Route::name('auth.')->group( function () {
  Route::get('/login', [AuthController::class,'login_page'])->name('login');
  Route::post('/login', [AuthController::class,'login'])->name('login_handle');
  Route::get('/signup', [AuthController::class,'signup_page'])->name('signup');
  Route::post('/signup', [AuthController::class,'signup'])->name('signup_handle');
  Route::get('/logout', [AuthController::class,'logout'])->name('logout');
});

Route::get('/{user:user_name}', [HomeController::class,'show'])->name('author');
