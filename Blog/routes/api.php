<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogAPIController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/allBlogList', [BlogAPIController::class, 'allBlogList']);
Route::post('/addBlog', [BlogAPIController::class, 'addBlog']);
Route::get('/getBlog/{id}', [BlogAPIController::class, 'getBlog']);
Route::post('/updateBlog', [BlogAPIController::class, 'updateBlog']);
Route::post('/deleteBlog/{id}', [BlogAPIController::class, 'deleteBlog']);