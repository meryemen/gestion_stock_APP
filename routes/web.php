<?php

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\FourniController;
use App\Http\Controllers\HistoriqueController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\TestController;
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
Route::get('/stock', [StockController::class, 'stock'])->name('stock')->middleware('isLoggedIn','accessStock');
Route::get('/accessoire', [StockController::class, 'accessoire'])->middleware('isLoggedIn')->name('accessoire');


Route::get('/dashboard', [StockController::class, 'dashboard'])->name('dashboard')->middleware('isLoggedIn');
//formulaire d'ajout d'un equipement
Route::get('/formulaire', [StockController::class, 'formulaire'])->middleware('isLoggedIn','manageStock');
Route::post('ajout-equipement',[StockController::class,'ajout'])->name('ajout-equipement');
Route::post('/edit-equipement/{id_equ}', [StockController::class, 'edit'])->name('edit-equipement');

Route::get('/fournisseur', [FourniController::class, 'fournisseur'])->middleware('isLoggedIn')->name('fournisseur');
Route::post('ajout-fournisseur', [FourniController::class, 'ajouter'])->name('ajout-fournisseur');
Route::post('/edit-fournisseur/{id_fourni}', [FourniController::class, 'edit'])->name('edit-fournisseur');
Route::post('/delete-fournisseur/{id_fourni}', [FourniController::class, 'delete'])->name('delete-fournisseur');
    
Route::get('historique', [HistoriqueController::class, 'show'])->middleware('isLoggedIn','is_admin');

Route::get('/search-utilisateur', [CustomAuthController::class,'search'])->middleware('isLoggedIn');
Route::get('/search-fournisseur', [FourniController::class,'search']);
Route::get('/search-materiel', [StockController::class,'search']);

Route::get('/error',[CustomAuthController::class,'error'])->middleware('isLoggedIn')->name('error');

Route::post('Addutilisateur', [CustomAuthController::class,'insert'])->name('ajout-utilisateur')->middleware('manageUser');
Route::post('/delete-utilisateur/{id}', [CustomAuthController::class, 'delete'])->name('delete-utilisateur');
Route::post('/edit-utilisateur/{id}', [CustomAuthController::class, 'edit'])->name('edit-utilisateur');
Route::post('/droit-acces/{id}', [CustomAuthController::class, 'updateDroitAcces'])->name('droit-acces');
Route::post('/update-password', [CustomAuthController::class, 'updatePassword'])->name('update-password');
Route::get('/check-email/{email}', [CustomAuthController::class, 'checkEmail'])->name('checkEmail');




Route::get('/info_equipement',[StockController::class,'info'])->name('info_equipement')->middleware('manageUser');

Route::get('/exportmateriel', [ExportController::class, 'exportmateriel'])->name('exportmateriel')->middleware('isLoggedIn');
Route::get('/exportaccessoire', [ExportController::class, 'exportaccessoire'])->name('exportaccessoire')->middleware('isLoggedIn');


Route::get('/reset-password',[CustomAuthController::class, 'resetPage'])->name('reset-password');
Route::post('/sendreset',[CustomAuthController::class, 'sendMail'])->name('sendreset');
Route::get('/pass',[CustomAuthController::class, 'pass'])->name('pass');