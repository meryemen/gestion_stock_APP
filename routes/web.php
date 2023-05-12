<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
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

Route::get('/dashboard', [StockController::class, 'dashboard'])->middleware('isLoggedIn');


Route::get('/logout',[CustomAuthController::class,'logout']);
Route::get('/profile',[CustomAuthController::class,'profile'])->name('profile');;

Route::post('update-profil',[CustomAuthController::class,'updateProfil'])->name('update-profil');
Route::get('/stock', [StockController::class, 'stock']);

//formulaire d'ajout d'un equipement
Route::get('/formulaire', [StockController::class, 'ajout']);

