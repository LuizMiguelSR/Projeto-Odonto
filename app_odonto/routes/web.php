<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdministrativoController;
use App\Http\Controllers\ProntuarioController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\LoginController;

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
Route::get('/administrativo/dashboard/cadastrar', [AdministrativoController::class, 'cadastrar'])->name('admin.cadastrar');
Route::post('/administrativo/dashboard/cadastrar/armazenar', [AdministrativoController::class, 'armazenar'])->name('admin.armazenar');
Route::get('/administrativo/dashboard/excluir/{id}', [AdministrativoController::class, 'excluir'])->name('admin.excluir');
Route::get('/administrativo/dashboard/editar/{id}', [AdministrativoController::class, 'editar'])->name('admin.editar');
Route::post('/administrativo/dashboard/editar/atualizar/{id}', [AdministrativoController::class, 'atualizar'])->name('admin.atualizar');

Route::get('/administrativo/paciente', [PacienteController::class, 'inicio'])->name('paciente.inicio');
Route::get('/administrativo/paciente/cadastrar', [PacienteController::class, 'cadastrar'])->name('paciente.cadastrar');
Route::post('/administrativo/paciente/cadastrar/armazenar', [PacienteController::class, 'armazenar'])->name('paciente.armazenar');
Route::get('/administrativo/paciente/excluir/{id}', [PacienteController::class, 'excluir'])->name('paciente.excluir');
Route::get('/administrativo/paciente/editar/{id}', [PacienteController::class, 'editar'])->name('paciente.editar');
Route::post('/administrativo/paciente/editar/atualizar/{id}', [PacienteController::class, 'atualizar'])->name('paciente.atualizar');

Route::get('/administrativo/prontuario', [ProntuarioController::class, 'inicio'])->name('prontuario.inicio');
Route::get('/administrativo/prontuario/cadastrar', [ProntuarioController::class, 'cadastrar'])->name('prontuario.cadastrar');
Route::post('/administrativo/prontuario/armazenar', [ProntuarioController::class, 'armazenar'])->name('prontuario.armazenar');
