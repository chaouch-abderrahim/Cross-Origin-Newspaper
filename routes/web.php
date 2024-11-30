<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\JournalController;
use Illuminate\Support\Facades\Route;


Route::prefix('web')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });    
    Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
    Route::get('/journals', [JournalController::class, 'index'])->name('journals.index');

});