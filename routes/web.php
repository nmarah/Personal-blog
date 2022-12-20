<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AskController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
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

Route::get('/',[AboutController::class,'index'])->name('index');
Route::get('/about',[AboutController::class,'about'])->name('about');
Route::get('/contact',[ContactController::class,'contact'])->name('contact');
Route::post('/save_asks', [ContactController::class,'save_asks'] )->name('save_ask');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.personalData');
Route::get('/dashboard/edit', [DashboardController::class, 'edit'])->name('dashboard.edit');
Route::put('/dashboard/update/{id}',[DashboardController::class, 'update'])->name('dashboard.update');
Route::get('/dashboard/categories', [CategoriesController::class, 'index'])->name('dashboard.categories');
Route::get('/dashboard/categories/create',[CategoriesController::class,'create'])->name('dashboard.categories.create');
Route::post('/dashboard/categories',[CategoriesController::class,'store'])->name('dashboard.categories.store');
Route::get('/dashboard/categories/edit/{id}', [CategoriesController::class, 'edit'])->name('dashboard.categories.edit');
Route::put('/dashboard/categories/update/{id}',[CategoriesController::class, 'update'])->name('dashboard.categories.update');
Route::delete('/dashboard/categories/{id}',[CategoriesController::class, 'delete'])->name('dashboard.categories.delete');
Route::get('dashboard/asks',[AskController::class,'index'])->name('dashboard.asks');