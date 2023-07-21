<?php

use App\Models\Listing;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;

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

Route::get('/',[ListingController::class,'index']);
Route::get('create',[ListingController::class,'create'])->name('job.create');
Route::post('store',[ListingController::class,'store'])->name('job.store');
Route::get('edit/{id}',[ListingController::class,'edit'])->name('job.edit');
Route::get('show/{id}',[ListingController::class,'show'])->name('job.show');
Route::post('update/{id}',[ListingController::class,'update'])->name('job.update');
Route::get('delete/{id}',[ListingController::class,'destroy'])->name('job.delete');

Route::get('register/',[UserController::class,'register'])->name('register');
Route::get('registerRequest/',[UserController::class,'registerRequest'])->name('registerRequest');
Route::get('login/',[UserController::class,'login'])->name('login');

