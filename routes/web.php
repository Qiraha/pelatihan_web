<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use GuzzleHttp\Middleware;
use App\Models\Note;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/',[NoteController::class,'index'])->middleware('auth')->name('notes.index');
Route::get('/notes',[NoteController::class,'index'])->middleware('auth')->name('home');
Route::get('/notes/create',[NoteController::class, 'create'])->middleware('auth');
Route::post('/notes/create',[NoteController::class, 'store'])->name('notes.store');;

Route::get('/register',[RegisterController::class, 'index'])->middleware('guest')->name('register');
Route::post('/register',[RegisterController::class, 'store'])->name('register.store');

Route::get('/login',[LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login',[LoginController::class, 'authenticate'])->middleware('guest');
Route::post('/logout',[LoginController::class, 'logout'])->middleware('auth');

Route::get('notes/show',[NoteController::class,'show'])->middleware('auth')->name('notes.show');
