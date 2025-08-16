<?php

use App\Livewire\CreateDocument;
use Illuminate\Support\Facades\Route;


Route::prefix('/document')
    ->name('document.')
    ->group(function () {

        Route::get('/create', CreateDocument::class)
            ->name('create');

    });