@extends('admin.layouts.layoutDashboard')
@section('titulo', 'Marcar Consulta')
@section('conteudo')
    <main class="col h-100 text-light p-4">
        <div class="d-flex align-items-end justify-content-between mb-4">
            <h1 class="h3">Marcar Consulta</h1>

            <a href="{{ route('consulta.inicio') }}" class="btn btn-light">Voltar</a>
        </div>

        <form method="post" action="{{ route('consulta.armazenar') }}" class="bg-custom rounded col-12 py-3 px-4">
            @csrf

            <div class="mb-3 row">
                <label for="paciente_id" class="col-sm-2 col-form-label">Nome:</label>
                <div class="col-sm-10">
                    <select name="paciente_id" class="form-control bg-dark text-light border-dark form-select" id="paciente_id" required>
                        <option value="" disabled selected>Selecione</option>
                        @foreach ($pacientes as $paciente)
                            <option value="{{ $paciente->id }}">{{ $paciente->nome }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="data_consulta" class="col-sm-2 col-form-label">Data:</label>
                <div class="col-sm-10">
                    <input type="datetime-local" class="form-control bg-dark text-light border-dark" id="data_consulta" name="data_consulta" value="{{ old('data_consulta') }}" required>
                    {{ $errors->has('data_consulta') ? $errors->first('data_consulta') : '' }}
                </div>
            </div>

            <div class="mb-3 row">
                <label for="descricao" class="col-sm-2 col-form-label">Descrição:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control bg-dark text-light border-dark" id="descricao" name="descricao" placeholder="Ex: Remoção de Aparelho" value="{{ old('descricao') }}" required>
                    {{ $errors->has('descricao') ? $errors->first('descricao') : '' }}
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-light">Marcar Consulta</button>
            </div>
        </form>

        <div class="bg-custom rounded overflow-hidden">

        </div>
    </main>
@endsection
