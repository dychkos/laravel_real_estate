<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\UserController;
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

Route::middleware("guest")->group(function(){
    Route::get('/login',[LoginController::class,'index'])->name("login");
    Route::get('/logout',[LoginController::class,'logout'])->withoutMiddleware("guest")->name("login.logout");
    Route::post('/login',[LoginController::class,'store'])->name("login.store");

    Route::get('/registration',[RegistrationController::class,'index'])->name("registration");
    Route::post('/registration',[RegistrationController::class,'store'])->name("registration.store");
});


Route::get('houses/{id}',[HouseController::class,'show'])->where('id',"[0-9]+")->name("houses.show");
Route::middleware("auth")->group(function(){
    Route::get('user/houses/create',[HouseController::class,'create'])->middleware("auth")->name("user.houses.create");
    Route::post('user/houses/create',[HouseController::class,'store'])->name("user.houses.store");

    Route::get('user/houses',[HouseController::class,'showForUser'])->name("user.houses");
    Route::get('user/houses/{id}/',[HouseController::class,'show'])->name("user.houses.show")->middleware("access");
    Route::get('user/houses/{id}/edit',[HouseController::class,'edit'])->name("user.houses.edit")->middleware("access");
    Route::post('user/houses/{id}/edit',[HouseController::class,'update'])->name("user.houses.update")->middleware("access");

    Route::get('user/edit',[UserController::class,'edit'])->name("user.edit");
    Route::post('user/update',[UserController::class,'update'])->name("user.update");


});


