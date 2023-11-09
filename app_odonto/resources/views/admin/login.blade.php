@extends('admin.layouts.layoutLogin')
@section('titulo', 'Login')
@section('conteudo')
    <main class="py-5" style="min-height: calc(100vh - 72px);">
        @component('admin.layouts._components.alertaErro')
        @endcomponent
        <div class="container">
            <div class="bg-custom mx-auto row col-8 rounded shadow-sm overflow-hidden">
                <div class="col-6 bg-white p-5 d-flex align-items-center justify-content-center">
                    <img src="{{ asset('imgs/kbrtec.png') }}" alt="KBRTEC" height="200" width="200" class="object-fit-contain">
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
                                <!-- <small class="bg-danger rounded py-1 px-2 mt-1 d-block text-light">Erro</small> -->
                            </div>

                            <div class="col-12 form-group text-light">
                                <label for="password">Senha:</label>
                                <input type="password" class="form-control bg-dark border-dark text-light" id="password" name="password" required autocomplete="current-password">
                                <!-- <small class="bg-danger rounded py-1 px-2 mt-1 d-block text-light">Erro</small> -->
                                {{ $errors->has('password') ? $errors->first('password') : '' }}
                                <a href="recuperar-senha.html" class="link-light"><small>Esqueci minha senha</small></a>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-light mt-3">Entrar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
