@extends('admin.layouts.layoutLogin')
@section('titulo', 'Recuperação de Senha')
@section('conteudo')
    <main class="py-5" style="min-height: calc(100vh - 72px);">

        @component('admin.layouts._components.alertaSucesso')
        @endcomponent

        <div class="container">
            <div class="bg-custom mx-auto row col-8 rounded shadow-sm overflow-hidden">
                <div class="col-6 bg-white p-5 d-flex align-items-center justify-content-center">
                    <img src="{{ asset('imgs/logo.png') }}" alt="Odonto" height="200" width="200" class="object-fit-contain">
                </div>

                <div class="col-6 d-flex align-items-center p-5">
                    <form method="post" action="{{ route('password.update') }}" class="form w-100">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <input type="hidden" name="email" value="{{ $email }}">
                        <h2 class="h4 text-light mb-4">Mudar Senha</h2>

                        <div class="row row-gap-3">

                            <div class="col-12 form-group text-light">
                                <label for="password">Nova Senha:</label>
                                <input type="password" class="form-control bg-dark border-dark text-light" id="password" name="password" required autocomplete="current-password">
                                {{ $errors->has('password') ? $errors->first('password') : '' }}
                            </div>

                            <div class="col-12 form-group text-light">
                                <label for="password">Confirmar Senha:</label>
                                <input type="password" class="form-control bg-dark border-dark text-light" id="password" name="password_confirmation" required autocomplete="current-password">
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-light mt-3">Enviar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
