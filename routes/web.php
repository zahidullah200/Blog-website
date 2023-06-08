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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [App\Http\Controllers\frontend\FronendController::class,'index']);
Route::get('toturial/{category_slug}', [App\Http\Controllers\frontend\FronendController::class,'viewCategoryPost']);
Route::get('toturial/{category_slug}/{post_slug}', [App\Http\Controllers\frontend\FronendController::class,'viewpost']);
Route::post('commnets', [App\Http\Controllers\frontend\CommentController::class,'store']);
Route::post('delete-comment', [App\Http\Controllers\frontend\CommentController::class,'destroy']);


Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function(){
    Route::get('/dashboard', [App\Http\Controllers\admin\DashboardController::class, 'index']);

    Route::get('/category', [App\Http\Controllers\admin\CategoryController::class, 'index']);
    Route::get('/add-category', [App\Http\Controllers\admin\CategoryController::class, 'create']);
    Route::post('add-category', [App\Http\Controllers\admin\CategoryController::class, 'store']);
    Route::get('edit-category/{category_id}', [App\Http\Controllers\admin\CategoryController::class, 'edit']);
    Route::put('update-category/{category_id}', [App\Http\Controllers\admin\CategoryController::class, 'update']);
    //Route::get('delete-category/{category_id}', [App\Http\Controllers\admin\CategoryController::class, 'delete']);
    Route::post('delete-category', [App\Http\Controllers\admin\CategoryController::class, 'delete']);

    Route::get('posts', [App\Http\Controllers\admin\PostController::class, 'index']);
    Route::get('add-post', [App\Http\Controllers\admin\PostController::class, 'create']);
    Route::post('add-post', [App\Http\Controllers\admin\PostController::class, 'store']);
    Route::get('delete-post/{id}', [App\Http\Controllers\admin\PostController::class, 'delete']);
    Route::get('edit-post/{id}', [App\Http\Controllers\admin\PostController::class, 'edit']);
    Route::put('update-post/{id}', [App\Http\Controllers\admin\PostController::class, 'update']);
    Route::get('user', [App\Http\Controllers\admin\UserController::class, 'index']);
    Route::get('user/{id}', [App\Http\Controllers\admin\UserController::class, 'edit']);
    Route::put('update-user/{id}', [App\Http\Controllers\admin\UserController::class, 'update']);
    Route::get('settings', [App\Http\Controllers\admin\SettingController::class, 'index']);
    Route::post('settings', [App\Http\Controllers\admin\SettingController::class, 'store']);

});