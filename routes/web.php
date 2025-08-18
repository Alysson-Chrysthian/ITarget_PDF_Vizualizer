<?php

use App\Livewire\CreateDocument;
use App\Livewire\SearchDocument;
use Illuminate\Support\Facades\Route;


Route::prefix('/document')
    ->name('document.')
    ->group(function () {

        Route::get('/create', CreateDocument::class)
            ->name('create');

        Route::get('/search', SearchDocument::class)
            ->name('search');

    });