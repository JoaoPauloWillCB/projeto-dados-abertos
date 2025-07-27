<?php

use App\Http\Controllers\DeputyController;
use App\Http\Controllers\DeputyExpenseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PartyController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('deputados')->name('deputados.')->group(function () {
    Route::get('/', [DeputyController::class, 'index'])->name('index');
    Route::get('/deputados', [DeputyController::class, 'index'])->name('deputados.index');
    Route::get('/{id}', [DeputyController::class, 'show'])->name('show');
    Route::get('/{id}/despesas', [DeputyExpenseController::class, 'index'])->name('despesas.index');
});

Route::prefix('partidos')->name('partidos.')->group(function () {
    Route::get('/{id}', [PartyController::class, 'show'])->name('show');
});