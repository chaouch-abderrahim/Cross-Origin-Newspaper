<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\JournalController;
use App\Http\Controllers\LeMondeController;
use Illuminate\Support\Facades\Route;



Route::get('/journals', [JournalController::class, 'indexJson'])->name('journals.index.json');
Route::get('/articles', [ArticleController::class, 'indexJson'])->name('articles.index.json');
Route::get('/lemonde', [ArticleController::class, 'ArticlesLeMondJson']);


