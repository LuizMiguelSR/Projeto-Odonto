@extends('admin.layouts.layoutDashboard')
@section('titulo', 'Editar Paciente')
@section('conteudo')
    <main class="col h-100 text-light p-4">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
        <div class="d-flex align-items-end justify-content-between mb-4">
            <h1 class="h3">Editar Paciente</h1>

            <a href="{{ route('paciente.inicio') }}" class="btn btn-light">Voltar</a>
        </div>

        <form method="post" action="{{ route('paciente.atualizar', $paciente->id) }}" class="bg-custom rounded col-12 py-3 px-4">
            @csrf

            <div class="mb-3 row">
                <label for="usuario" class="col-sm-2 col-form-label">Nome:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control bg-dark text-light border-dark" id="usuario" name="nome" placeholder="Ex: José da Silva" value="{{ $paciente->nome }}" required>
                    {{ $errors->has('nome') ? $errors->first('nome') : '' }}
                </div>
            </div>

            <div class="mb-3 row">
                <label for="email" class="col-sm-2 col-form-label">E-mail:</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control bg-dark text-light border-dark" id="email" name="email" placeholder="Ex: admin@email.com.br" value="{{ $paciente->email }}">
                    {{ $errors->has('email') ? $errors->first('email') : '' }}
                </div>
            </div>

            <div class="mb-3 row">
                <label for="cpf" class="col-sm-2 col-form-label">CPF:</label>
                <div class="col-sm-10">
                    <input type="cpf" class="form-control bg-dark text-light border-dark" id="cpf" name="cpf" placeholder="Ex: XXX.XXX.XXX-XX" value="{{ $paciente->cpf }}">
                    {{ $errors->has('cpf') ? $errors->first('cpf') : '' }}
                </div>
            </div>

            <div class="mb-3 row">
                <label for="telefone" class="col-sm-2 col-form-label">Telefone:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control bg-dark text-light border-dark" id="telefone" name="telefone" placeholder="Ex: (XX)XXXXX-XXXX" value="{{ $paciente->telefone }}" required>
                    {{ $errors->has('telefone') ? $errors->first('telefone') : '' }}
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-light">Editar Paciente</button>
            </div>
        </form>

        <div class="bg-custom rounded overflow-hidden">

        </div>
        <script>
            $(document).ready(function() {
                $('#cpf').mask('000.000.000-00');
            });
            $(document).ready(function() {
                $('#telefone').mask('(00)00000-0000');
            });
        </script>
    </main>
@endsection
