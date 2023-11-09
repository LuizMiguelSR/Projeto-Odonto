<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="icon" type="image/x-icon" href="img/favicon.ico">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
        <link href="{{ asset('css/estiloDashboard.css') }}" rel="stylesheet">
        <title>Odonto - @yield('titulo')</title>
    </head>
    <body class="bg-dark h-100">
        @include('admin.layouts._partials.top')
        <div class="d-flex" style="min-height: calc(100vh - 76px - 72px);">
            @include('admin.layouts._partials.aside')

            <main class="col h-100 text-light p-4">
                @yield('conteudo')
            </main>
        </div>
        @include('admin.layouts._partials.footer')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    </body>
</html>
