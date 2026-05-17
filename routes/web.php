<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\Admin\OptionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomePropertyController;
use App\Http\Controllers\AuthController;

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

// Routes pour la partie authentification du site
Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login.authenticate');
Route::delete('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Routes pour la partie administration du site
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::resource('properties', PropertyController::class)->except(['show']);
    Route::resource('options', OptionController::class)->except(['show']);
});
