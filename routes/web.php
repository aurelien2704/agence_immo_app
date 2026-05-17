<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\Admin\OptionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomePropertyController;

$idRegex = '[0-9]+';
$slugRegex = '[0-9a-z\-]+';

// Routes pour la partie publique du site
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/biens', [HomePropertyController::class, 'index'])->name('property.index');
Route::get('/biens/{slug}-{property}', [HomePropertyController::class, 'show'])->name('property.show')->where([
    'slug' => $slugRegex,
    'property' => $idRegex
]);

// Route qui reçoit les données du formulaire de contact d'un bien immobilier
Route::post('/biens/{property}/contact', [HomePropertyController::class, 'contact'])->name('property.contact')->where([
    'property' => $idRegex
]);

// Routes pour la partie administration du site
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('properties', PropertyController::class)->except(['show']);
    Route::resource('options', OptionController::class)->except(['show']);
});
