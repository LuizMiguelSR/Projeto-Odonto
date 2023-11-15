@extends('admin.layouts.layoutLogin')
@section('titulo', 'Login')
@section('conteudo')
    <main class="py-5" style="min-height: calc(100vh - 72px);">
        @component('admin.layouts._components.alertaErro')
        @endcomponent
        <div class="container">
            <div class="bg-custom mx-auto row col-8 rounded shadow-sm overflow-hidden">
                <div class="col-6 bg-white p-5 d-flex align-items-center justify-content-center">
                    <img src="{{ asset('imgs/logo.png') }}" alt="Odonto" height="200" width="200" class="object-fit-contain">
                </div>

                <div class="col-6 d-flex align-items-center p-5">
                    <form method="post" action="{{ route('admin.login') }}" class="form w-100">
                        @csrf
                        <h2 class="h4 text-light mb-4">Painel Administrativo</h2>

                        <div class="row row-gap-3">
                            <div class="col-12 form-group text-light">
                                <label for="email">E-mail:</label>
                                <input type="email" name="email" class="form-control bg-dark border-dark text-light" id="email" placeholder="example@email.com.br" required autocomplete="email" autofocus value="{{ old('email') }}">
                                {{ $errors->has('email') ? $errors->first('email') : '' }}
                            </div>

                            <div class="col-12 form-group text-light">
                                <label for="password">Senha:</label>
                                <input type="password" class="form-control bg-dark border-dark text-light" id="password" name="password" required autocomplete="current-password">
                                {{ $errors->has('password') ? $errors->first('password') : '' }}
                                <a href="recuperar-senha.html" class="link-light"><small>Esqueci minha senha</small></a>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-light mt-3">Entrar</button>
                            </div>
                        </form>
                        <form method="get" action="{{ route('admin.login_google') }}" class="form w-100">
                            @csrf
                            <div class="col-12">
                                <button type="submit" class="btn btn-light mt-3" style="background-color: #4285F4; color: white; border: none; padding: 10px; border-radius: 5px;">
                                    <img src="{{ asset('imgs/google.jpg') }}" alt="Ícone do Google" style="width: 30px; height: 30px; margin-right: 10px;">
                                    Entrar com Google
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
