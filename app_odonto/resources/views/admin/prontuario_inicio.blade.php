@extends('admin.layouts.layoutDashboard')
@section('titulo', 'Prontuários')
@section('conteudo')
    <div class="d-flex justify-content-between mb-4">
        @component('admin.layouts._components.alertaSucesso')
        @endcomponent
        <h1 class="h3">Prontuários</h1>

        <div class="d-flex gap-2">
            <a href="{{ route('prontuario.cadastrar') }}" class="btn btn-light">Enviar um Prontuário</a>
        </div>
    </div>

    <div class="d-flex justify-content-between align-items-end mb-3">
        <form method="get" action="{{ route('prontuario.filtrar') }}" class="bg-custom rounded col-12 py-3 px-4">

            <div class="row align-items-end row-gap-4">
                <div class="col-6 d-flex flex-wrap">
                    <label for="search" class="col-form-label">Buscar por nome:</label>
                    <div class="col-12">
                        <input type="text" name="nome" class="form-control bg-dark text-light border-dark" id="search" placeholder="Ex: José da Silva">
                    </div>
                </div>

                <div class="col-5 row">
                    <div class="col-12 col-form-label">Data:</div>

                    <div class="col-6 d-flex gap-2">
                        <label for="de" class="col-form-label">De:</label>
                        <input type="date" name="data_inicio" class="form-control bg-dark text-light border-dark" id="de">
                    </div>

                    <div class="col-6 d-flex gap-2">
                        <label for="ate" class="col-form-label">Até:</label>
                        <input type="date" name="data_fim" class="form-control bg-dark text-light border-dark" id="ate">
                    </div>
                </div>

                <div class="col d-flex justify-content-end">
                    <button type="submit" class="btn btn-light w-100">Filtrar</button>
                </div>
            </div>
        </form>
    </div>


    <div class="bg-custom rounded overflow-hidden">
        <table class="table mb-0 table-custom table-dark align-middle">
            <thead>
                <tr>
                    <th scope="col" class="text-uppercase">Nome Paciente</th>
                    <th scope="col" class="text-uppercase">Data</th>
                    <th scope="col" class="text-uppercase text-center">Visualizar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($prontuarios as $prontuario)
                    <tr>
                        <td>{{ $prontuario->paciente->nome }}</td>
                        <td>{{ date('d/m/Y', strtotime($prontuario->created_at)) }}</td>
                        <td>
                            <div class="d-flex justify-content-center">
                                <button type="button" class="btn btn-light d-flex justify-content-center align-items-center rounded-circle p-2 mx-2" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $prontuario->id }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                    </svg>
                                </button>
                            </div>
                            <div class="modal fade modal-lg" id="exampleModal{{ $prontuario->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog  modal-lg modal-dialog-centered text-light">
                                    <div class="modal-content bg-custom">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Prontuário de {{ $prontuario->paciente->nome }}</h1>
                                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body d-flex flex-wrap row-gap-4">
                                            <embed id="pdfEmbed{{ $prontuario->id }}" src="{{ asset('storage/'.$prontuario->caminho_arquivo) }}" width="900px" height="600px" type="application/pdf">
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{ $paginator->links('admin.layouts._components.paginator') }}

@endsection
