<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\Admin\OptionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomePropertyController;

$idRegex = '[0-9]+';
$slugRegex = '[0-9a-z\-]+';

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/biens', [HomePropertyController::class, 'index'])->name('property.index');
Route::get('/biens/{slug}-{property}', [HomePropertyController::class, 'show'])->name('property.show')->where([
    'slug' => $slugRegex,
    'property' => $idRegex
]);

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('properties', PropertyController::class)->except(['show']);
    Route::resource('options', OptionController::class)->except(['show']);
});
