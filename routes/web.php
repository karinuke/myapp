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

use App\Http\Controllers\Mypage\RecipeController;
Route::controller(RecipeController::class)->prefix('mypage')->middleware('auth')->group(function(){
    Route::get('recipe/create','add')->name('recipe.add');
    Route::get('recipe/edit','edit')->name('recipe.edit');
    Route::post('recipe/create','create')->name('mypage.recipe.create');
});

use App\Http\Controllers\Mypage\ProfileController;
Route::controller(ProfileController::class)->prefix('mypage')->middleware('auth')->group(function(){
    Route::get('profile/create','add');
    Route::get('profile/edit','edit');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('auth')->name('home');
