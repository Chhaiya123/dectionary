<?php

use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Word\WordController;
use App\Http\Controllers\WordsController;
use Illuminate\Support\Facades\Route;


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


// Route::get('/', [UserController::class ,'index'])->name('index');
// Route::get('/', function(){
//     return view('dashboard.dashboard');
// });
// Route::get('/', function(){
//     return view('layout');
// });
// Route::get('/login', [UserController::class ,'login'])->name('login');
// Route::get('/register', [UserController::class ,'register'])->name('register');


// Route::get('/words/{id}', [WordController::class, 'update'])->name('word.update');
// Route::get('/create', [WordController::class, 'create'])->name('create');
// Route::post('/store', [WordController::class, 'store'])->name('word.store');


Route::controller(LoginRegisterController::class)->group(function() {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::get('/', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::post('/logout', 'logout')->name('logout');
});
Route::controller(WordController::class)->group(function(){
    Route::get('/words', 'words')->name('words');
    Route::get('/create', 'create')->name('create');
    Route::post('/word.store', 'store')->name('word.store');
    Route::get('/edit/{id}', 'edit')->name('data_up');
    Route::put('/wordupdate/{id}', 'update')->name('data_update');
    Route::get('/delete/{id}', 'remove')->name('remove');
    Route::get('/search', 'search')->name('search');
});
Route::controller(UserController::class)->group(function(){
    Route::get('/users', 'index')->name('data');
    Route::get('/profile', 'profile_view')->name('data');
    Route::get('/search.profile', 'search')->name('search.profile');
    Route::put('/update/{id}', 'upload')->name('upload');
});