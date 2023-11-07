@extends('admin.layouts.layoutLogin')
@section('titulo', 'Login')
@section('conteudo')
    <main>
        @component('admin.layouts._components.alertaErro')
        @endcomponent
        <div class="container-fluid ps-md-0">
            <div class="row g-0">
                <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"><img src="{{ asset('imgs/background.jpg') }}" alt="background"></div>
                    <div class="col-md-8 col-lg-6">
                        <div class="login d-flex align-items-center py-5">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-9 col-lg-8 mx-auto">
                                        <h3 class="login-heading mb-4">Bem vindo!</h3>

                                        <!-- Sign In Form -->
                                        <form method="post" action="{{ route('admin.login') }}">
                                            @csrf
                                            <div class="form-floating mb-3">
                                                <input type="email" name="email" class="form-control" id="floatingInput" placeholder="example@kbrtec.com.br" required autocomplete="email" autofocus value="{{ old('email') }}">
                                                {{ $errors->has('email') ? $errors->first('email') : '' }}
                                                <label for="floatingInput">Email</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
                                                {{ $errors->has('password') ? $errors->first('password') : '' }}
                                                <label for="floatingPassword">Senha</label>
                                            </div>

                                            <div class="form-check mb-3">
                                                <input class="form-check-input" type="checkbox" value="" id="rememberPasswordCheck">
                                                <label class="form-check-label" for="rememberPasswordCheck">
                                                Lembrar Senha
                                                </label>
                                            </div>

                                            <div class="d-grid">
                                                <button class="btn btn-lg btn-primary btn-login text-uppercase fw-bold mb-2" type="submit">Entrar</button>
                                                <div class="text-center">
                                                <a class="small" href="#">Esqueceu a senha?</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
