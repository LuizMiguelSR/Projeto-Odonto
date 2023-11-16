@extends('admin.layouts.layoutLogin')
@section('titulo', 'Esqueci a Senha')
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
                    <form method="post" action="{{ route('password.email') }}" class="form w-100">
                        @csrf
                        <h2 class="h4 text-light">Esqueceu sua senha?</h2>
                        <p class="mb-4 text-light fw-light">Apenans digite seu e-mail abaixo e enviaremos um link para ele para redefinir sua senha!</p>

                        <div class="row row-gap-3">
                            <div class="col-12 form-group text-light">
                                <label for="email">E-mail:</label>
                                <input type="email" class="form-control bg-dark border-dark text-light" id="email" placeholder="example@email.com.br" name="email" value="{{ old('email') }}" >
                            </div>

                            <div class="col-12 mt-3 d-flex gap-2 align-items-center justify-content-between">
                                <button type="submit" class="btn btn-light">Resetar senha</button>

                                <a href="{{ route('admin.inicio') }}" class="link-light">Voltar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
