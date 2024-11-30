<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\JournalController;
use Illuminate\Support\Facades\Route;


Route::prefix('api')->group(function () {
    Route::get('/journals', [JournalController::class, 'indexJson'])->name('journals.index.json');
    Route::get('/articles', [ArticleController::class, 'indexJson'])->name('articles.index.json');
});

