<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BloggerController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BlogCommentController;

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

Route::get('/', [HomeController::class, 'index'])->name('index');

//New Blogger Registration
Route::get('/registration', [RegistrationController::class, 'registration'])->name('registration');
Route::post('/registration', [RegistrationController::class, 'registrationSubmitted'])->name('registration');

//Login & Logout
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'loginSubmit'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

//Blogger Dashboard
Route::get('/dashboard', [BloggerController::class, 'dashboard'])->middleware('validBlogger')->name('dashboard');

// Blog Dashboard
Route::get('/allBlog', [BlogController::class, 'allBlog'])->middleware('validBlogger')->name('allBlog');
Route::get('/blogDetails', [BlogController::class, 'blogDetails'])->middleware('validBlogger')->name('blogDetails');

//New Blog Creation
Route::get('/blogCreate', [BlogController::class, 'blogCreate'])->middleware('validBlogger')->name('blogCreate');
Route::post('/blogCreate', [BlogController::class, 'blogCreateSubmitted'])->middleware('validBlogger')->name('blogCreate');

//Blog Edit & Delete
Route::get('/blogEdit/{id}/{slug}', [BlogController::class, 'blogEdit'])->middleware('validBlogger');
Route::post('/blogEditSubmitted', [BlogController::class, 'blogEditSubmitted'])->middleware('validBlogger')->name('blogEdit');
Route::get('/blogDelete/{id}/{slug}', [BlogController::class, 'blogDelete'])->middleware('validBlogger');

//Blog Comment
Route::get('/blogComment/{id}', [BlogCommentController::class, 'blogComment'])->middleware('validBlogger')->name('blogComment');
Route::post('/blogCommentSubmitted', [BlogCommentController::class, 'blogCommentSubmitted'])->middleware('validBlogger')->name('blogComment');