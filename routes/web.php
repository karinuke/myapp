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

use App\Http\Controllers\MypageController as PublicMypageController;
Route::get('/', [PublicMypageController::class, 'index']) -> name('mypage.index');

use App\Http\Controllers\Mypage\MenuController;
Route::controller(MenuController::class)->prefix('mypage')->name('mypage.')->middleware('auth')->group(function(){
    Route::get('menu/create','add')->name('menu.add');
    //Route::get('menu/edit','edit')->name('menu.edit');
    Route::post('menu/create','create')->name('menu.create');
    Route::get('menu', 'index')->name('menu');
});

use App\Http\Controllers\Mypage\RecipeController;
Route::controller(RecipeController::class)->prefix('mypage')->name('mypage.')->middleware('auth')->group(function(){
    Route::get('recipe/create','add')->name('recipe.add');
    Route::get('recipe/edit','edit')->name('recipe.edit');
    Route::post('recipe/create','create')->name('recipe.create');
    Route::get('recipe','index')->name('recipe.index');
    Route::get('recipe/edit','edit')->name('recipe.edit');
    Route::post('recipe/edit','update')->name('recipe.update');
    Route::get('recipe/delete', 'delete')->name('recipe.delete');
});

use App\Http\Controllers\Mypage\ProfileController;
Route::controller(ProfileController::class)->prefix('mypage')->name('mypage.')->middleware('auth')->group(function(){
    Route::get('profile/create','add')->name('profile.add');
    Route::get('profile/edit','edit')->name('profile.edit');
    Route::post('profile/create','create')->name('profile.create');
    Route::get('profile','index')->name('profile.index');
    Route::get('profile/edit','edit')->name('profile.edit');
    Route::post('profile/edit','update')->name('profile.update');
});

use App\Http\Controllers\RecipeController as PublicRecipeController;
Route::controller(PublicRecipeController::class)->middleware('auth')->group(function(){
    Route::get('recipe','index')->name('recipe.index');
    Route::get('recipe/post', 'show')->name('recipe.post');
    Route::get('recipe/staple','staple')->name('recipe.staple');
    Route::get('recipe/maindish','maindish')->name('recipe.maindish');
    Route::get('recipe/sidedish','sidedish')->name('recipe.sidedish');
    Route::get('recipe/soup','soup')->name('recipe.soup');
    Route::get('recipe/profile','profile')->name('recipe.profile');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('auth')->name('home');
