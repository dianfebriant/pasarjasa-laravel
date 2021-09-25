<?php

use App\Models\Information;
use Illuminate\Support\str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TechnicianController;
use App\Http\Controllers\InformationController;

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

// Route::get('/', function () {
//     return view('layouts/mainHome');
// });
Route::get('/', [FrontController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
});


// Route::get('/category/{id}', [FrontController::Class, 'show'])->name('category.show');
// Route::get('/kategori-jasa/{technician:slug}', [FrontController::Class, 'show_kategori'])->name('kategori.nama');



Route::resource('information', InformationController::Class);
Route::resource('category', CategoryController::Class);
Route::resource('technician', TechnicianController::Class);
Route::get('/technician/{category:slug}', [FrontController::Class, 'show_kategori']);




