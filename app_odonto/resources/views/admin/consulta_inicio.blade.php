@extends('admin.layouts.layoutDashboard')
@section('titulo', 'Consultas')
@section('conteudo')
    <div class="d-flex justify-content-between mb-4">
        @component('admin.layouts._components.alertaSucesso')
        @endcomponent
        <h1 class="h3">Consultas</h1>

        <div class="d-flex gap-2">
            <a href="{{ route('consulta.marcar') }}" class="btn btn-light">Marcar uma Consulta</a>
        </div>
    </div>

    <div class="d-flex justify-content-between align-items-end mb-3">
        <form action="" class="bg-custom rounded col-12 py-3 px-4">

            <div class="row align-items-end row-gap-4">
                <div class="col-3 d-flex flex-wrap">
                    <label for="search" class="col-form-label">Buscar:</label>
                    <div class="col-12">
                        <input type="text" class="form-control bg-dark text-light border-dark" id="search" placeholder="Ex: Admin">
                    </div>
                </div>

                <div class="col-3 d-flex flex-wrap">
                    <label for="status" class="col-form-label">Status:</label>
                    <div class="col-12">
                        <select name="status" class="form-control bg-dark text-light border-dark form-select" id="status">
                            <option value="" disabled selected>Selecione</option>
                            <option value="ativado">Ativado</option>
                            <option value="desativado">Desativado</option>
                        </select>
                    </div>
                </div>

                <div class="col-5 row">
                    <div class="col-12 col-form-label">Data:</div>

                    <div class="col-6 d-flex gap-2">
                        <label for="de" class="col-form-label">De:</label>
                        <input type="text" class="form-control bg-dark text-light border-dark" id="de" placeholder="27/10/2023">
                    </div>

                    <div class="col-6 d-flex gap-2">
                        <label for="ate" class="col-form-label">Até:</label>
                        <input type="text" class="form-control bg-dark text-light border-dark" id="ate" placeholder="27/10/2023">
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
                    <th scope="col" class="text-uppercase">Nome do Paciente</th>
                    <th scope="col" class="text-uppercase">Data da Consulta</th>
                    <th scope="col" class="text-uppercase">Descrição</th>
                    <th scope="col" class="text-uppercase">Status</th>
                    <th scope="col" class="text-uppercase text-center">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($consultas as $consulta)
                    <tr>
                        <td>{{ $consulta->paciente->nome }}</td>
                        <td>{{ date('d/m/Y', strtotime($consulta->data_consulta)) }} ás {{ date('H:i', strtotime($consulta->data_consulta)) }}</td>
                        <td>{{ $consulta->descricao }}</td>
                        <td>{{ $consulta->status }}</td>
                        <td>
                            <div class="d-flex justify-content-center">
                                <a href="{{ route('consulta.remarcar', $consulta->id ) }}" class="btn btn-light d-flex justify-content-center align-items-center rounded-circle p-2 mx-2" title="Remarcar">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                        <path fill="#141618" d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                    </svg>
                                </a>

                                <a href="{{ route('consulta.desmarcar', $consulta->id ) }}" class="btn btn-danger d-flex justify-content-center align-items-center rounded-circle p-2 mx-2" title="Desmarcar">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path fill="#FFF" d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                                        <path fill="#FFF" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                                    </svg>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{ $paginator->links('admin.layouts._components.paginator') }}

@endsection
