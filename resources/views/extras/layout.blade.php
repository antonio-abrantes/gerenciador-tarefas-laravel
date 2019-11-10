<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ url('css/app.css') }}">
    <title>Document</title>
</head>
<body>

    <div class="container">
        <div class="col-md-12">
            @yield('titulo')
            <div class="row">
                <div class="col-md-9">
                    @yield('conteudo')
                </div>
                <div class="col-md-3">
                    @section('barra-lateral')
                        <h3>Barra Lateral</h3>
                    @show
                </div>
            </div>
        </div>
    </div>

</body>
</html>