<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\UserController;
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
    Route::get('/login', [LoginController::class,'index'])->name("login");
    Route::get('/logout', [LoginController::class,'logout'])->withoutMiddleware("guest")->name("login.logout");
    Route::post('/login', [LoginController::class,'store'])->name("login.store");
    Route::get('/registration', [RegistrationController::class,'index'])->name("registration");
    Route::post('/registration', [RegistrationController::class,'store'])->name("registration.store");
});


Route::name('user.')->prefix('user')->middleware('auth')->group(function(){
    Route::name('admin.')->prefix('admin-panel')->middleware('admin_role')->group(function(){
        Route::get("", [AdminController::class,"index"])->name("index");
        Route::get("users", [AdminController::class,"usersShow"])->name("users");
        Route::get("houses", [AdminController::class,"housesShow"])->name("houses");
        Route::get("orders", [AdminController::class,"ordersShow"])->name("orders");

        Route::post("features", [AdminController::class,"storeFeatures"])->name("features.store");
        Route::post("houses", [AdminController::class,"updateHouses"])->name("houses.update");
        Route::post("users", [AdminController::class,"updateUsers"])->name("users.update");

        Route::delete("features", [AdminController::class,"deleteFeatures"])->name("features.delete");
        Route::delete("comments", [AdminController::class,"deleteComments"])->name("comments.delete");
    });
});


Route::name("user.")->prefix("user")->middleware("auth")->group(function(){
    Route::get('houses/create', [HouseController::class,'create'])->name("houses.create");
    Route::post('houses/create', [HouseController::class,'store'])->name("houses.store");
    Route::get('houses', [HouseController::class,'showForUser'])->name("houses");

    Route::get('houses/{id}/', [HouseController::class,'show'])->name("houses.show")->middleware("access");
    Route::get('houses/{id}/edit', [HouseController::class,'edit'])->name("houses.edit")->middleware("access");
    Route::post('houses/{id}/edit', [HouseController::class,'update'])->name("houses.update")->middleware("access");

    Route::get('edit', [UserController::class,'edit'])->name("edit");
    Route::post('update', [UserController::class,'update'])->name("update");
    Route::get("orders", [OrderController::class,'index'])->name("orders");

});

Route::get('houses/{id}', [HouseController::class,'show'])->where('id',"[0-9]+")->name("houses.show");
Route::post('houses/{id}', [OrderController::class,'store'])->where('id',"[0-9]+")->name("orders.store");

Route::get('feedback/', [CommentController::class,'create'])->name("comment.create");
Route::post('feedback/', [CommentController::class,'store'])->name("comment.store");



