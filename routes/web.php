<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HouseController;

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

Route::get('/', [HouseController::class,'index'])->name("home");
Route::redirect('/houses','/');

Route::get('/login',[LoginController::class,'index'])->name("login");
Route::post('/login',[LoginController::class,'store'])->name("login.store");

Route::get('/registration',[RegistrationController::class,'index'])->name("registration");
Route::post('/registration',[RegistrationController::class,'store'])->name("registration.store");

Route::get('houses/{id}',[HouseController::class,'showOne'])->where('id',"[0-9]+")->name("house");
Route::get('houses/add_form',[HouseController::class,'addShow'])->name("house.add");
Route::post('houses/add_form',[HouseController::class,'store']);

