<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BloggerController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BlogController;

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
    return view('index');
});

//Index
Route::get('/index', [BloggerController::class, 'index'])->name('index');

//New Blogger Registration
Route::get('/registration', [RegistrationController::class, 'registration'])->name('registration');
Route::post('/registration', [RegistrationController::class, 'registrationSubmitted'])->name('registration');

//Login & Logout
Route::get('/login',[LoginController::class,'login'])->name('login');
Route::post('/login',[LoginController::class,'loginSubmit'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

//Blogger Dashboard
Route::get('/dashboard', [BloggerController::class,'dashboard'])->middleware('validBlogger')->name('dashboard');

//Blog Dashboard
Route::get('/allBlog', [BlogController::class,'allBlog'])->name('allBlog');