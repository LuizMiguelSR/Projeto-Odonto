<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdministrativoController;

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
    return redirect()->route('admin.inicio');
});

Route::get('/login', [LoginController::class, 'inicio'])->name('admin.inicio');
Route::post('/login', [LoginController::class, 'login'])->name('admin.login');
Route::get('/logout', [LoginController::class, 'logout'])->name('admin.logout');

Route::get('/administrativo/dashboard', [AdministrativoController::class, 'dashboard'])->name('admin.dashboard');
