<?php

use App\Http\Controllers\Api\InstituicaoController;
use Illuminate\Support\Facades\Route;

Route::prefix('instituicoes')->group(function () {
    Route::get('/', [InstituicaoController::class, 'index'])->name('instituicoes.index');
    Route::post('/', [InstituicaoController::class, 'store'])->name('instituicoes.store');
    Route::get('{id}', [InstituicaoController::class, 'show'])->name('instituicoes.show'); 
    Route::put('{id}', [InstituicaoController::class, 'update'])->name('instituicoes.update');
    Route::delete('{id}', [InstituicaoController::class, 'destroy'])->name('instituicoes.destroy');
});