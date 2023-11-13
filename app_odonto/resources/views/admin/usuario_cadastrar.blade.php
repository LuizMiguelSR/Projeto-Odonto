@extends('admin.layouts.layoutDashboard')
@section('titulo', 'Cadastrar Usuário')
@section('conteudo')
    <main class="col h-100 text-light p-4">
        <div class="d-flex align-items-end justify-content-between mb-4">
            <h1 class="h3">Cadastrar Usuário</h1>

            <a href="{{ route('usuario.inicio') }}" class="btn btn-light">Voltar</a>
        </div>

        <form method="post" action="{{ route('usuario.armazenar') }}" class="bg-custom rounded col-12 py-3 px-4">
            @csrf

            <div class="mb-3 row">
                <label for="usuario" class="col-sm-2 col-form-label">Usuário:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control bg-dark text-light border-dark" id="usuario" name="name" placeholder="Ex: Admin" value="{{ old('name') }}" required>
                    {{ $errors->has('name') ? $errors->first('name') : '' }}
                </div>
            </div>

            <div class="mb-3 row">
                <label for="email" class="col-sm-2 col-form-label">E-mail:</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control bg-dark text-light border-dark" id="email" name="email" placeholder="Ex: admin@kbrtec.com.br" value="{{ old('email') }}" required>
                    {{ $errors->has('email') ? $errors->first('email') : '' }}
                </div>
            </div>

            <div class="mb-3 row">
                <label for="role" class="col-sm-2 col-form-label">Role:</label>
                <div class="col-sm-10">
                    <select name="role" class="form-control bg-dark text-light border-dark form-select" id="role" required>
                        <option value="" disabled selected>Selecione</option>
                        <option value="admin" {{ request()->input('role') == 'admin' ? 'selected' : '' }}>Administrador</option>
                        <option value="user" {{ request()->input('role') == 'user' ? 'selected' : '' }}>Usuário</option>
                    </select>
                    {{ $errors->has('role') ? $errors->first('role') : '' }}
                </div>
            </div>

            <div class="mb-3 row">
                <label for="senha" class="col-sm-2 col-form-label">Senha:</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control bg-dark text-light border-dark" id="senha" name="password" required>
                    {{ $errors->has('password') ? $errors->first('password') : '' }}
                </div>
            </div>

            <div class="mb-3 row">
                <label for="confSenha" class="col-sm-2 col-form-label">Confirmar Senha:</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control bg-dark text-light border-dark" id="confSenha" name="password_confirmation" required>
                    {{ $errors->has('password') ? $errors->first('password') : '' }}
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-light">Cadastrar</button>
            </div>
        </form>

        <div class="bg-custom rounded overflow-hidden">

        </div>
    </main>
@endsection
