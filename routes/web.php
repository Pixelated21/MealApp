<?php

use App\Http\Controllers\Authentication;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Choices;
use App\Http\Controllers\Meal;
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

Route::get("/",[Authentication::class,"index"]);
Route::get("/admin",[Authentication::class,"adminIndex"]);

Route::get("/login",[Authentication::class,"loginIndex"]);
Route::get("/register",[Authentication::class,"registerIndex"]);
Route::post("/logout",[Authentication::class,"logout"]);

Route::post('/reg',[Authentication::class,'register']);
Route::post('/log',[Authentication::class,'login']);

Route::post('/add-cat',[CategoryController::class,'create'])->name('Add-Category');
Route::post('/add-meal',[Meal::class,'create'])->name('Add-Meal');
Route::post('/add-choice',[Choices::class,'addChoice'])->name('Add-Choice');
Route::get('/view-choice',[Choices::class,'view'])->name('View-Choice');
