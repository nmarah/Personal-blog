
<?php

use App\Http\Controllers\AskController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => '/dashboard',
    'as' => 'dashboard.',
    // 'middleware' => ['auth'],
], function () {
    Route::get('/personaldata', [DashboardController::class, 'index'])->name('personalData');
    Route::get('/edit', [DashboardController::class, 'edit'])->name('edit');
    Route::put('/update/{id}', [DashboardController::class, 'update'])->name('update');
    Route::get('/categories', [CategoriesController::class, 'index'])->name('categories');
    Route::get('/categories/create', [CategoriesController::class, 'create'])->name('categories.create');
    Route::post('/categories', [CategoriesController::class, 'store'])->name('categories.store');
    Route::get('/categories/edit/{id}', [CategoriesController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/update/{id}', [CategoriesController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{id}', [CategoriesController::class, 'delete'])->name('categories.delete');
});