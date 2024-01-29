<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;

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


// Login SIGA
Route::get('/', [LoginController::class, 'index'])->name('login');
Route::get('/login/cas', [LoginController::class, 'loginUC'])->name('login-uc');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/login/validate/login', [LoginController::class, 'validateLogin'])->name('validar-login');
Route::post('/login/validate/passwd', [LoginController::class, 'validatePasswd'])->name('validar-passwd');
Route::post('/login/validate/code', [LoginController::class, 'validateCode'])->name('validar-code');


Route::middleware('auth.siga')->group(function () {

    // Dashboard
    Route::get('/dashboard', [ DashboardController::class, 'index' ])->name('dashboard');


    // Administrador Plataforma
    // Users
    /*
    Route::get('/admin/users/ajax-crud-datatable', 
                [ UserController::class, 'index' ]);
    Route::post('/admin/users/store', 
                [ UserController::class, 'store' ]);
    Route::post('/admin/users/edit', 
                [ UserController::class, 'edit' ]);
    Route::post('/admin/users/delete', 
                [ UserController::class , 'destroy']);
    Route::post('/admin/users/enable', 
                [ UserController::class, 'enable' ]);
    Route::post('/admin/users/disable', 
                [ UserController::class, 'disable' ]);
                */
});

