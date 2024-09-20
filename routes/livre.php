<?php

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


Route::middleware(['admin', 'comptable', 'directeur'])->group(function () {




//----------------- Auteurs

Route::get('/auteurs/index', [App\Http\Controllers\Admin\AuteurController::class, 'index'])->name('admin_inscriptions_index');
Route::get('/auteurs/modifier/{id}', [App\Http\Controllers\Admin\AuteurController::class, 'edit'])->name('admin_inscriptions_edit');
Route::get('/auteurs/detail/{id}', [App\Http\Controllers\Admin\AuteurController::class, 'detail'])->name('admin_inscriptions_detail');
Route::get('/auteurs/charger/{id}', [App\Http\Controllers\Admin\AuteurController::class, 'charger'])->name('admin_inscriptions_charger');
Route::post('/auteurs/update/{id}', [App\Http\Controllers\Admin\AuteurController::class, 'update'])->name('admin_inscriptions_update');
Route::post('/auteurs/delete/{id}', [App\Http\Controllers\Admin\AuteurController::class, 'delete'])->name('admin_inscriptions_delete');



//----------------- Categories

Route::get('/auteurs/index', [App\Http\Controllers\Admin\AuteurController::class, 'index'])->name('admin_inscriptions_index');
Route::get('/auteurs/modifier/{id}', [App\Http\Controllers\Admin\AuteurController::class, 'edit'])->name('admin_inscriptions_edit');
Route::get('/auteurs/detail/{id}', [App\Http\Controllers\Admin\AuteurController::class, 'detail'])->name('admin_inscriptions_detail');
Route::get('/auteurs/charger/{id}', [App\Http\Controllers\Admin\AuteurController::class, 'charger'])->name('admin_inscriptions_charger');
Route::post('/auteurs/update/{id}', [App\Http\Controllers\Admin\AuteurController::class, 'update'])->name('admin_inscriptions_update');
Route::post('/auteurs/delete/{id}', [App\Http\Controllers\Admin\AuteurController::class, 'delete'])->name('admin_inscriptions_delete');



//----------------- Maison d editions

Route::get('/maisons/index', [App\Http\Controllers\Admin\AuteurController::class, 'index'])->name('admin_inscriptions_index');
Route::get('/maisons/modifier/{id}', [App\Http\Controllers\Admin\AuteurController::class, 'edit'])->name('admin_inscriptions_edit');
Route::get('/maisons/detail/{id}', [App\Http\Controllers\Admin\AuteurController::class, 'detail'])->name('admin_inscriptions_detail');
Route::get('/maisons/charger/{id}', [App\Http\Controllers\Admin\AuteurController::class, 'charger'])->name('admin_inscriptions_charger');
Route::post('/maisons/update/{id}', [App\Http\Controllers\Admin\AuteurController::class, 'update'])->name('admin_inscriptions_update');
Route::post('/maisons/delete/{id}', [App\Http\Controllers\Admin\AuteurController::class, 'delete'])->name('admin_inscriptions_delete');




//----------------- Livres

Route::get('/maisons/index', [App\Http\Controllers\Admin\AuteurController::class, 'index'])->name('admin_inscriptions_index');
Route::get('/maisons/modifier/{id}', [App\Http\Controllers\Admin\AuteurController::class, 'edit'])->name('admin_inscriptions_edit');
Route::get('/maisons/detail/{id}', [App\Http\Controllers\Admin\AuteurController::class, 'detail'])->name('admin_inscriptions_detail');
Route::get('/maisons/charger/{id}', [App\Http\Controllers\Admin\AuteurController::class, 'charger'])->name('admin_inscriptions_charger');
Route::post('/maisons/update/{id}', [App\Http\Controllers\Admin\AuteurController::class, 'update'])->name('admin_inscriptions_update');
Route::post('/maisons/delete/{id}', [App\Http\Controllers\Admin\AuteurController::class, 'delete'])->name('admin_inscriptions_delete');



//----------------- Annee d editions 

Route::get('/maisons/index', [App\Http\Controllers\Admin\AuteurController::class, 'index'])->name('admin_inscriptions_index');
Route::get('/maisons/modifier/{id}', [App\Http\Controllers\Admin\AuteurController::class, 'edit'])->name('admin_inscriptions_edit');
Route::get('/maisons/detail/{id}', [App\Http\Controllers\Admin\AuteurController::class, 'detail'])->name('admin_inscriptions_detail');
Route::get('/maisons/charger/{id}', [App\Http\Controllers\Admin\AuteurController::class, 'charger'])->name('admin_inscriptions_charger');
Route::post('/maisons/update/{id}', [App\Http\Controllers\Admin\AuteurController::class, 'update'])->name('admin_inscriptions_update');
Route::post('/maisons/delete/{id}', [App\Http\Controllers\Admin\AuteurController::class, 'delete'])->name('admin_inscriptions_delete');





});
