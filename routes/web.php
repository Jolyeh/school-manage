<?php

use App\Http\Controllers\AnneeScolaireController;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\EleveController;
use App\Http\Controllers\MaitreController;
use App\Http\Controllers\ParcourController;
use App\Http\Controllers\ParcourMaitreController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('dashboard.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//maitre
Route::middleware('auth')->group(function () {
    Route::get('/maitre', [MaitreController::class,'index'])->name('maitre');
    Route::get('/add-maitre', [MaitreController::class,'create'])->name('add-maitre');
    Route::post('/add-maitre', [MaitreController::class,'store'])->name('store-maitre');
    Route::get('/show-maitre/{id}', [MaitreController::class,'show'])->name('show-maitre');
    Route::get('/update-maitre/{id}', [MaitreController::class,'edit'])->name('edit-maitre');
    Route::put('/update-maitre/{id}', [MaitreController::class,'update'])->name('update-maitre');
    Route::delete('/delete-maitre', [MaitreController::class,'destroy'])->name('delete-maitre');
});


//annee scolaire
Route::middleware('auth')->group(function () {
    Route::get('/annee-scolaire', [AnneeScolaireController::class,'index'])->name('annee-scolaire');
    Route::get('/add-annee-scolaire', [AnneeScolaireController::class,'create'])->name('add-annee-scolaire');
    Route::post('/add-annee-scolaire', [AnneeScolaireController::class,'store'])->name('store-annee-scolaire');
    Route::get('/show-annee-scolaire/{id}', [AnneeScolaireController::class,'show'])->name('show-annee-scolaire');
    Route::get('/edit-annee-scolaire/{id}', [AnneeScolaireController::class,'edit'])->name('edit-annee-scolaire');
    Route::put('/update-annee-scolaire/{id}', [AnneeScolaireController::class,'update'])->name('update-annee-scolaire');
    Route::delete('/delete-annee-scolaire', [AnneeScolaireController::class,'destroy'])->name('delete-annee-scolaire');
});

//classe
Route::middleware('auth')->group(function () {
    Route::get('/classe', [ClasseController::class,'index'])->name('classe');
    Route::get('/add-classe', [ClasseController::class,'create'])->name('add-classe');
    Route::post('/add-classe', [ClasseController::class,'store'])->name('store-classe');
    //Route::get('/show-classe/{id}', [ClasseController::class,'show'])->name('show-classe');
    Route::get('/edit-classe/{id}', [ClasseController::class,'edit'])->name('edit-classe');
    Route::put('/update-classe/{id}', [ClasseController::class,'update'])->name('update-classe');
    Route::delete('/delete-classe', [ClasseController::class,'destroy'])->name('delete-classe');
});

//eleve
Route::middleware('auth')->group(function () {
    Route::get('/eleve', [EleveController::class,'index'])->name('eleve');
    Route::get('/add-eleve', [EleveController::class,'create'])->name('add-eleve');
    Route::post('/add-eleve', [EleveController::class,'store'])->name('store-eleve');
    Route::get('/show-eleve/{id}', [EleveController::class,'show'])->name('show-eleve');
    Route::get('/edit-eleve/{id}', [EleveController::class,'edit'])->name('edit-eleve');
    Route::put('/update-eleve/{id}', [EleveController::class,'update'])->name('update-eleve');
    Route::delete('/delete-eleve', [EleveController::class,'destroy'])->name('delete-eleve');
});

//parcour eleve
Route::middleware('auth')->group(function () {
    Route::get('/parcour', [ParcourController::class,'index'])->name('parcour');
    Route::get('/add-parcour', [ParcourController::class,'create'])->name('add-parcour');
    Route::post('/add-parcour', [ParcourController::class,'store'])->name('store-parcour');
    //Route::get('/show-parcour/{id}', [ParcourController::class,'show'])->name('show-parcour');
    Route::get('/edit-parcour/{id}', [ParcourController::class,'edit'])->name('edit-parcour');
    Route::put('/update-parcour/{id}', [ParcourController::class,'update'])->name('update-parcour');
    Route::delete('/delete-parcour', [ParcourController::class,'destroy'])->name('delete-parcour');
});

//parcour eleve
Route::middleware('auth')->group(function () {
    Route::get('/parcour-maitre', [ParcourMaitreController::class,'index'])->name('parcour-maitre');
    Route::get('/add-parcour-maitre', [ParcourMaitreController::class,'create'])->name('add-parcour-maitre');
    Route::post('/add-parcour-maitre', [ParcourMaitreController::class,'store'])->name('store-parcour-maitre');
    //Route::get('/show-parcour-maitre/{id}', [ParcourMaitreController::class,'show'])->name('show-parcour-maitre');
    Route::get('/edit-parcour-maitre/{id}', [ParcourMaitreController::class,'edit'])->name('edit-parcour-maitre');
    Route::put('/update-parcour-maitre/{id}', [ParcourMaitreController::class,'update'])->name('update-parcour-maitre');
    Route::delete('/delete-parcour-maitre', [ParcourMaitreController::class,'destroy'])->name('delete-parcour-maitre');
});