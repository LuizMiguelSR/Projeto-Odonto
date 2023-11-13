@extends('admin.layouts.layoutDashboard')
@section('titulo', 'Enviar Prontuário')
@section('conteudo')
    <main class="col h-100 text-light p-4">
        <div class="d-flex align-items-end justify-content-between mb-4">
            <h1 class="h3">Enviar Prontuário</h1>

            <a href="{{ route('prontuario.inicio') }}" class="btn btn-light">Voltar</a>
        </div>

        <form method="post" action="{{ route('prontuario.armazenar') }}" class="bg-custom rounded col-12 py-3 px-4" enctype="multipart/form-data">
            @csrf

            <div class="mb-3 row">
                <label for="nome" class="col-sm-2 col-form-label">Nome:</label>
                <div class="col-sm-10">
                    <select name="id" class="form-control bg-dark text-light border-dark form-select" id="id" required>
                        <option value="" disabled selected>Selecione</option>
                        @foreach ($pacientes as $paciente)
                            <option value="{{ $paciente->id }}">{{ $paciente->nome }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="formFile" class="col-sm-2 col-form-label">Prontuário em PDF até 5mb</label>
                <div class="col-sm-10">
                    <input class="form-control bg-dark text-light border-dark" type="file" id="formFile" name="pdf_file" accept=".pdf" required>
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-light">Enviar Prontuário</button>
            </div>
        </form>

        <div class="bg-custom rounded overflow-hidden">

        </div>
    </main>
@endsection
