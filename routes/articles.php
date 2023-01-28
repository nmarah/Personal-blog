<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticlesController;


Route::group([
    'prefix' => '/dashboard',
    //'as' => 'dashboard.',
], function() {
    Route::get('/articels', [ArticlesController::class,'index'])->name('dashboard.articles');
    Route::get('/create', [ArticlesController::class,'create'])->name('dashboard.articles.create');
    Route::post('/articels', [ArticlesController::class,'store'])->name('dashboard.articles.store');
    Route::get('/{article}/articels', [ArticlesController::class,'show'])->name('articles.show');

    // Route::get('/{article}/edit', 'ArticlesController@edit')->name('edit');
    // Route::patch('/{article}', 'ArticlesController@update')->name('update');
    // Route::delete('/{article}', 'ArticlesController@destroy')->name('destroy');
});
