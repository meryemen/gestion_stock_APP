<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\FourniController;
use App\Http\Controllers\HistoriqueController;
use App\Http\Controllers\StockController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/utilisateurs', [CustomAuthController::class, 'table'])->middleware('isLoggedIn')->name('utilisateur');
Route::get('/createUser', [CustomAuthController::class, 'createUser'])->middleware('isLoggedIn');


Route::post('update-profil',[CustomAuthController::class,'updateProfil'])->name('update-profil');
Route::get('/stock', [StockController::class, 'stock'])->name('stock')->middleware('isLoggedIn');
Route::get('/accessoire', [StockController::class, 'accessoire'])->middleware('isLoggedIn');


Route::get('/dashboard', [StockController::class, 'dashboard'])->name('dashboard')->middleware('isLoggedIn');
//formulaire d'ajout d'un equipement
Route::get('/formulaire', [StockController::class, 'formulaire'])->middleware('isLoggedIn');
Route::post('ajout-equipement',[StockController::class,'ajout'])->name('ajout-equipement');

Route::get('/fournisseur', [FourniController::class, 'fournisseur'])->middleware('isLoggedIn')->name('fournisseur');
Route::post('ajout-fournisseur', [FourniController::class, 'ajouter'])->name('ajout-fournisseur');
Route::post('/edit-fournisseur/{id_fourni}', [FourniController::class, 'edit'])->name('edit-fournisseur');
Route::post('/delete-fournisseur/{id_fourni}', [FourniController::class, 'delete'])->name('delete-fournisseur');
    
Route::get('exporter', [ExportController::class, 'export'])->name('exporter');
Route::get('historique', [HistoriqueController::class, 'show'])->middleware('isLoggedIn','is_admin');

Route::get('/search-utilisateur', [CustomAuthController::class,'search']);
Route::get('/search-fournisseur', [FourniController::class,'search']);

Route::get('/error',[CustomAuthController::class,'error'])->middleware('isLoggedIn')->name('error');

Route::post('Addutilisateur', [CustomAuthController::class,'insert'])->name('ajout-utilisateur');
Route::post('/delete-utilisateur/{id}', [CustomAuthController::class, 'delete'])->name('delete-utilisateur');
Route::post('/droit-acces/{id}', [CustomAuthController::class, 'updateDroitAcces'])->name('droit-acces');

