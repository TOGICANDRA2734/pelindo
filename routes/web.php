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
        if (Auth::user()->role =='kapal') {
            return redirect()->route('ship-registration-user.create');
        } else {
            return redirect()->route('dashboard.index');
        }
    });

    // Route dashboard
    Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard.index');
    
    // Ship Registration User 
    Route::resource('ship-registration-user', ShipRegistrationUserController::class);

    // Ship Registration Admin
    Route::resource('ship-registration-admin', ShipRegistrationAdminController::class);
    Route::get('ship-registration-approve/{id}', [ShipRegistrationAdminController::class, 'approveDokumenKapal'])->name('ship-approve');
    Route::post('ship-registration-galangan/{id}', [ShipRegistrationAdminController::class, 'tambahGalangan'])->name('galangan.add');
    Route::put('ship-registration-galangan-edit/{id}', [ShipRegistrationAdminController::class, 'editGalangan'])->name('galangan.edit');
    Route::post('ship-registration-sertifikat-doc/{id}', [ShipRegistrationAdminController::class, 'tambahSertifikatDoc'])->name('sertifikat-doc.add');
    Route::put('ship-registration-sertifikat-doc-edit/{id}', [ShipRegistrationAdminController::class, 'editSertifikatDoc'])->name('sertifikat-doc.edit');
    Route::post('ship-registration-proses-end/{id}', [ShipRegistrationAdminController::class, 'tambahEnd'])->name('proses-end.add');
    Route::put('ship-registration-proses-end-edit/{id}', [ShipRegistrationAdminController::class, 'editEnd'])->name('proses-end.edit');
    Route::post('ship-registration-laporan/{id}', [ShipRegistrationAdminController::class, 'tambahLaporan'])->name('laporan.add');
    Route::put('ship-registration-laporan-edit/{id}', [ShipRegistrationAdminController::class, 'editLaporan'])->name('laporan.edit');
    Route::post('ship-registration-sertifikat/{id}', [ShipRegistrationAdminController::class, 'tambahSertifikat'])->name('sertifikat.add');
    Route::put('ship-registration-sertifikat-edit/{id}', [ShipRegistrationAdminController::class, 'editSertifikat'])->name('sertifikat.edit');

    // Filtering for Ship Documentation
    Route::get('ship-documentation', [ShipRegistrationUserController::class, 'filter'])->name('ship-documentation.filter');

    // Logout
    Route::post('/logout', function () {
        Auth::logout();
        return redirect()->route('login');
    })->name('logout');

    
});
