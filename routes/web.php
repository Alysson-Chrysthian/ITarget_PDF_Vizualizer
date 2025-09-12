<?php

use App\Http\Controllers\PDFController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', 'creditors/create');

Route::prefix('/creditors')
    ->name('creditors.')
    ->group(function () {

        Route::get('/', App\Livewire\Creditors\SearchCreditor::class)
            ->name('search');
        Route::get('/create', App\Livewire\Creditors\CreateCreditor::class)
            ->name('create');
        Route::get('/edit/{id}', App\Livewire\Creditors\EditCreditor::class)
            ->name('edit');

    });

Route::prefix('/instituitions')
    ->name('instituitions.')
    ->group(function () {

        Route::get('/', App\Livewire\Instituitions\SearchInstituition::class)
            ->name('search');
        Route::get('/create', App\Livewire\Instituitions\CreateInstituition::class)
            ->name('create');
        Route::get('/edit/{id}', App\Livewire\Instituitions\EditInstituition::class)
            ->name('edit');

    });

Route::prefix('/documents')
    ->name('documents.')
    ->group(function () {

        Route::get('/', App\Livewire\Documents\SearchDocument::class)
            ->name('search');
        Route::get('/create', App\Livewire\Documents\CreateDocument::class)
            ->name('create');
        Route::get('/edit/{id}', App\Livewire\Documents\EditDocument::class)
            ->name('edit');

    });

Route::prefix('/pdf')
    ->name('pdf.')
    ->group(function () {

        Route::get('/generate/{id}', [PDFController::class, 'generateDocumentPDF'])
            ->name('generate');
        Route::get('/read', [PDFController::class, 'readDocumentPDF'])
            ->name('read');

    });