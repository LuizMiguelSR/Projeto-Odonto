<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdministrativoController;
use App\Http\Controllers\EsqueciSenhaController;
use App\Http\Controllers\ProntuarioController;
use App\Http\Controllers\ConsultasController;
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
Route::get('/login/auth/google', [LoginController::class, 'redirectToGoogle'])->name('admin.login_google');
Route::get('/login/auth/google/callback', [LoginController::class, 'handleGoogleCallback'])->name('admin.login_google_callback');

Route::get('/password/reset', [EsqueciSenhaController::class, 'inicio'])->name('password.request');
Route::post('/password/email', [EsqueciSenhaController::class, 'enviarSenhaEmail'])->name('password.email');
Route::get('/password/email/{token}', [EsqueciSenhaController::class, 'senhaResetLink'])->name('password.reset');
Route::post('/password/update', [EsqueciSenhaController::class, 'senhaUpdate'])->name('password.update');

Route::get('/administrativo/usuario', [AdministrativoController::class, 'inicio'])->name('usuario.inicio');
Route::get('/administrativo/usuario/cadastrar', [AdministrativoController::class, 'cadastrar'])->name('usuario.cadastrar');
Route::post('/administrativo/usuario/cadastrar/armazenar', [AdministrativoController::class, 'armazenar'])->name('usuario.armazenar');
Route::get('/administrativo/usuario/excluir/{id}', [AdministrativoController::class, 'excluir'])->name('usuario.excluir');
Route::get('/administrativo/usuario/editar/{id}', [AdministrativoController::class, 'editar'])->name('usuario.editar');
Route::post('/administrativo/usuario/editar/atualizar/{id}', [AdministrativoController::class, 'atualizar'])->name('usuario.atualizar');
Route::any('/administrativo/usuario/filtrar', [AdministrativoController::class, 'filtrar'])->name('usuario.filtrar');

Route::get('/administrativo/paciente', [PacienteController::class, 'inicio'])->name('paciente.inicio');
Route::get('/administrativo/paciente/cadastrar', [PacienteController::class, 'cadastrar'])->name('paciente.cadastrar');
Route::post('/administrativo/paciente/cadastrar/armazenar', [PacienteController::class, 'armazenar'])->name('paciente.armazenar');
Route::get('/administrativo/paciente/excluir/{id}', [PacienteController::class, 'excluir'])->name('paciente.excluir');
Route::get('/administrativo/paciente/editar/{id}', [PacienteController::class, 'editar'])->name('paciente.editar');
Route::post('/administrativo/paciente/editar/atualizar/{id}', [PacienteController::class, 'atualizar'])->name('paciente.atualizar');
Route::any('/administrativo/paciente/filtrar', [PacienteController::class, 'filtrar'])->name('paciente.filtrar');

Route::get('/administrativo/prontuario', [ProntuarioController::class, 'inicio'])->name('prontuario.inicio');
Route::get('/administrativo/prontuario/cadastrar', [ProntuarioController::class, 'cadastrar'])->name('prontuario.cadastrar');
Route::post('/administrativo/prontuario/armazenar', [ProntuarioController::class, 'armazenar'])->name('prontuario.armazenar');
Route::any('/administrativo/prontuario/filtrar', [ProntuarioController::class, 'filtrar'])->name('prontuario.filtrar');

Route::get('/administrativo/consulta', [ConsultasController::class, 'inicio'])->name('consulta.inicio');
Route::get('/administrativo/consulta/marcar', [ConsultasController::class, 'marcar'])->name('consulta.marcar');
Route::post('/administrativo/consulta/armazenar', [ConsultasController::class, 'armazenar'])->name('consulta.armazenar');
Route::get('/administrativo/consulta/desmarcar/{id}', [ConsultasController::class, 'desmarcar'])->name('consulta.desmarcar');
Route::get('/administrativo/consulta/remarcar/{id}', [ConsultasController::class, 'remarcar'])->name('consulta.remarcar');
Route::post('/administrativo/consulta/remarcar/atualizar/{id}', [ConsultasController::class, 'atualizar'])->name('consulta.atualizar');
Route::any('/administrativo/consulta/filtrar', [ConsultasController::class, 'filtrar'])->name('consulta.filtrar');
