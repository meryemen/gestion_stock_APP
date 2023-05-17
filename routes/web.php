<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\FourniController;
use App\Http\Controllers\StockController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/login', [CustomAuthController::class, 'login'])->middleware('alreadyLoggedIn');
Route::get('/create', [CustomAuthController::class, 'createNewUser']);
Route::post('login-user',[CustomAuthController::class,'loginUser'])->name('login-user');
Route::get('/logout',[CustomAuthController::class,'logout']);
Route::get('/profile',[CustomAuthController::class,'profile'])->name('profile')->middleware('isLoggedIn');

Route::get('/utilisateurs', [CustomAuthController::class, 'table'])->middleware('isLoggedIn');
Route::get('/createUser', [CustomAuthController::class, 'createUser'])->middleware('isLoggedIn');


Route::post('update-profil',[CustomAuthController::class,'updateProfil'])->name('update-profil');
Route::get('/stock', [StockController::class, 'stock'])->name('stock')->middleware('isLoggedIn');

Route::get('/dashboard', [StockController::class, 'dashboard'])->middleware('isLoggedIn');
//formulaire d'ajout d'un equipement
Route::get('/formulaire', [StockController::class, 'formulaire'])->middleware('isLoggedIn');
Route::post('ajout-equipement',[StockController::class,'ajout'])->name('ajout-equipement');

Route::get('/fournisseur', [FourniController::class, 'fournisseur'])->middleware('isLoggedIn')->name('fournisseur');
Route::post('ajout-fournisseur', [FourniController::class, 'ajouter'])->name('ajout-fournisseur');
Route::post('/delete-fournisseur/{id_fourni}', [FourniController::class, 'delete'])->name('delete-fournisseur');
    
Route::get('exporter', [ExportController::class, 'export'])->name('exporter');
