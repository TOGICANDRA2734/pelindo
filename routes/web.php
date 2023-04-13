<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShipRegistrationAdminController;
use App\Http\Controllers\ShipRegistrationUserController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        if (Auth::user()->role =='user') {
            return redirect()->route('ship-registration-user.create');
        } else {
            return redirect()->route('dashboard.index');
        }
    });

    // Route dashboard
    Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard.index');
    
    // Ship Registration User & Admin
    Route::resource('ship-registration-user', ShipRegistrationUserController::class);
    Route::resource('ship-registration-admin', ShipRegistrationAdminController::class);

    // Filtering for Ship Documentation
    Route::get('ship-documentation', [ShipRegistrationUserController::class, 'filter'])->name('ship-documentation.filter');

    // Logout
    Route::post('/logout', function () {
        Auth::logout();
        return redirect()->route('login');
    })->name('logout');
});
