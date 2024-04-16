<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'loginregisterView']);


Route::get('/createPortofolio', [MainController::class, 'createPortofolioView']);


Route::get('/your', [MainController::class, 'yourView']);

Route::get('/loginRegister', [MainController::class, 'loginRegisterView']);

Route::post('/register', [MainController::class, 'register']);

Route::post('/logout', [MainController::class, 'logout']);

Route::post('/login', [MainController::class, 'login']);

Route::post('/writeToPortofolio/', [MainController::class, 'writeToPortofolio']);

Route::delete('/main', [MainController::class, 'destroy'])->name('main.destroy');