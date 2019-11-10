@extends('layouts.app')

@section('titulo-pagina')
    <h1>Editar Cliente</h1>
@endsection

@section('content')

    <div class="row">

        <div class="col-md-8">

            <form class="form-inline" enctype="multipart/form-data" action="{{route('clients.update', $client)}}" method="post">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                @include('clients.form')

            </form>

        </div>
    </div>

@endsection


@section('titulo')
    <h2>Titulo da pagina</h2>
@endsection


@section('barra-lateral')
    <h3>Minha barra lateral do cadastro</h3>
    @parent
@endsection