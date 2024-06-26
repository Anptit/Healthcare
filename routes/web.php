<?php

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\RegisterAppointmentController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('layouts.nav', ['title' => 'Login']);
})->name('nav.login');

Auth::routes();

Route::prefix('user')->name('user.')->group(function() 
{
    Route::middleware(['guest','prevent_back_history'])->group(function()
    {   
        Route::view('login', 'dashboard.user.login', ['title' => 'User login'])->name('login');
        Route::view('register', 'dashboard.user.register', ['title' => 'User register'])->name('register');
        Route::post('create', [UserController::class, 'create'])->name('create');
        Route::post('check', [UserController::class, 'check'])->name('check');
    });

    Route::middleware(['auth', 'prevent_back_history'])->group(function()
    {
        Route::prefix('home')->group(function() {
            Route::get('/', [UserController::class, 'index'])->name('home');
            Route::view('appointment', 'dashboard.user.appointment')->name('appointment');
            Route::view('mail', 'emails.user.email')->name('email');
            Route::post('appointment', [RegisterAppointmentController::class, 'makeAppointment'])->name('appointment_handler');
        });
        Route::post('logout', [UserController::class, 'logout'])->name('logout');
    });
});
