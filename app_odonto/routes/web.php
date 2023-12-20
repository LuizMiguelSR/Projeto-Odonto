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

Route::get('/', [LoginController::class, 'inicio'])->name('admin.inicio');
Route::get('/logout', [LoginController::class, 'logout'])->name('admin.logout');

Route::prefix('login')->group(function () {
    Route::name('admin.')->group(function () {
        Route::controller(LoginController::class)->group(function () {
            Route::post('/', 'login')->name('login');
            Route::get('/auth/google', 'redirectToGoogle')->name('login_google');
            Route::get('/auth/google/callback', 'handleGoogleCallback')->name('login_google_callback');
        });
    });
});

Route::prefix('password')->group(function () {
    Route::name('password.')->group(function () {
        Route::controller(EsqueciSenhaController::class)->group(function () {
            Route::get('/reset', 'inicio')->name('request');
            Route::post('/email', 'enviarSenhaEmail')->name('email');
            Route::get('/email/{token}', 'senhaResetLink')->name('reset');
            Route::post('/update', 'senhaUpdate')->name('update');
        });
    });
});

Route::prefix('usuario')->group(function () {
    Route::name('usuario.')->group(function () {
        Route::controller(AdministrativoController::class)->group(function () {
            Route::get('/', 'inicio')->name('inicio');
            Route::get('/cadastrar', 'cadastrar')->name('cadastrar');
            Route::post('/cadastrar/armazenar', 'armazenar')->name('armazenar');
            Route::get('/excluir/{id}', 'excluir')->name('excluir');
            Route::get('/editar/{id}', 'editar')->name('editar');
            Route::post('/editar/atualizar/{id}', 'atualizar')->name('atualizar');
            Route::any('/filtrar', 'filtrar')->name('filtrar');
        });
    });
});

Route::prefix('paciente')->group(function () {
    Route::name('paciente.')->group(function () {
        Route::controller(PacienteController::class)->group(function () {
            Route::get('/', 'inicio')->name('inicio');
            Route::get('/cadastrar', 'cadastrar')->name('cadastrar');
            Route::post('/cadastrar/armazenar', 'armazenar')->name('armazenar');
            Route::get('/excluir/{id}', 'excluir')->name('excluir');
            Route::get('/editar/{id}', 'editar')->name('editar');
            Route::post('/editar/atualizar/{id}', 'atualizar')->name('atualizar');
            Route::any('/filtrar', 'filtrar')->name('filtrar');
        });
    });
});

Route::prefix('prontuario')->group(function () {
    Route::name('prontuario.')->group(function () {
        Route::controller(ProntuarioController::class)->group(function () {
            Route::get('/', 'inicio')->name('inicio');
            Route::get('/cadastrar', 'cadastrar')->name('cadastrar');
            Route::post('/armazenar', 'armazenar')->name('armazenar');
            Route::any('/filtrar', 'filtrar')->name('filtrar');
        });
    });
});

Route::prefix('consulta')->group(function () {
    Route::name('consulta.')->group(function () {
        Route::controller(ConsultasController::class)->group(function () {
            Route::get('/', 'inicio')->name('inicio');
            Route::get('/marcar', 'marcar')->name('marcar');
            Route::post('/armazenar', 'armazenar')->name('armazenar');
            Route::get('/desmarcar/{id}', 'desmarcar')->name('desmarcar');
            Route::get('/remarcar/{id}', 'remarcar')->name('remarcar');
            Route::post('/remarcar/atualizar/{id}', 'atualizar')->name('atualizar');
            Route::any('/filtrar', 'filtrar')->name('filtrar');
        });
    });
});
