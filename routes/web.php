<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PrincipalController;
use App\Http\Middleware\CheckIsLogged;
use App\Http\Middleware\CheckIsNotLogged;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Autenticação de usuários não logados
Route::middleware([CheckIsNotLogged::class])->group(function() {
  Route::get('/login', [AuthController::class, 'login'])->name('login');
  Route::post('/loginAccount', [AuthController::class, 'loginAccount']);
});

// Autenticação de usuários logados
Route::middleware([CheckIsLogged::class])->group(function(){
  Route::get('/', [PrincipalController::class, 'index'])->name('home');
  Route::get('/newNote', [PrincipalController::class, 'newNote'])->name('new');
  Route::post('/newNoteSubmit', [PrincipalController::class, 'newNoteSubmit'])->name('newNoteSubmit');
  Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
  Route::get('/editNote/{id}', [PrincipalController::class, 'editNote'])->name('edit');
  Route::post('/editNoteSubmit', [PrincipalController::class, 'editNoteSubmit'])->name('editNoteSubmit');
  Route::get('/deleteNote/{id}', [PrincipalController::class, 'deleteNote'])->name('delete');
  Route::post('/deleteNoteSubmit', [PrincipalController::class, 'deleteNoteSubmit'])->name('deleteNoteSubmit');
});