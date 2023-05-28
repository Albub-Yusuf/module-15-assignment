<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\CheckAuthenticateUser;
use App\Http\Middleware\FormValidationMiddleware;
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


Route::get('/',function(){
    return view('home');
});

Route::post('/check',[HomeController::class,'showValidateData'])->middleware([FormValidationMiddleware::class]);

Route::get('/home',function(){
    return redirect('/dashboard',302);
});

Route::get('/dashboard',function(){
    return "Dashboard";
});


Route::middleware([CheckAuthenticateUser::class])->group(function () {

    Route::get('/profile',[HomeController::class,'profile']);
    Route::get('/settings', [HomeController::class,'settings']);
});


Route::resource('Product',ProductController::class);

Route::get('contact-form',function(){
    return view('contact');
});

Route::post('/contact',ContactController::class);

Route::resource('/Post',PostController::class);

Route::get('/blade',[HomeController::class,'welcome']);