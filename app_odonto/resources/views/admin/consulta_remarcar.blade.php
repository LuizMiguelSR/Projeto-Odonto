@extends('admin.layouts.layoutDashboard')
@section('titulo', 'Remarcar Consulta')
@section('conteudo')
    <main class="col h-100 text-light p-4">
        <div class="d-flex align-items-end justify-content-between mb-4">
            <h1 class="h3">Remarcar consulta de {{ $consulta->paciente->nome }}</h1>

            <a href="{{ route('consulta.inicio') }}" class="btn btn-light">Voltar</a>
        </div>

        <form method="post" action="{{ route('consulta.atualizar', $consulta->id) }}" class="bg-custom rounded col-12 py-3 px-4">
            @csrf

            <div class="mb-3 row">
                <label for="data_consulta" class="col-sm-2 col-form-label">Data:</label>
                <div class="col-sm-10">
                    <input type="datetime-local" class="form-control bg-dark text-light border-dark" id="data_consulta" name="data_consulta" value="{{ $consulta->data_consulta }}">
                    {{ $errors->has('data_consulta') ? $errors->first('data_consulta') : '' }}
                </div>
            </div>

            <div class="mb-3 row">
                <label for="descricao" class="col-sm-2 col-form-label">Descrição:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control bg-dark text-light border-dark" id="descricao" name="descricao" value="{{ $consulta->descricao }}">
                    {{ $errors->has('descricao') ? $errors->first('descricao') : '' }}
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-light">Remarcar Consulta</button>
            </div>
        </form>

        <div class="bg-custom rounded overflow-hidden">

        </div>
    </main>
@endsection
