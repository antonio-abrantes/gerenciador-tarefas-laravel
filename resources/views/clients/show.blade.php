@extends('layouts.app')

@section('titulo-pagina')
    <h1>Detalhes do Cliente</h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <p>Id: {{ $client->id }}</p>
            <p>Nome: {{ $client->name }}</p>
            <p>E-mail: {{ $client->email }}</p>
            <p>Idade: {{ $client->age }}</p>

            <p>Foto do Cliente <a href="{{ route('clients.photo_download', $client->id) }}">Download</a></p>
            <img src="{{ asset('storage/'. str_after($client->photo, 'public/')) }}"
                 alt="" width="300">
        </div>
    </div>
    <a href="{{ route('clients.index') }}">Lista de Clientes</a>

    <br><br>
    <p>
        Projetos do Cliente

        @forelse($client->projects as $item)
            <p>{{$item->name}}</p>
        @empty
            <br><strong>Cliente não tem projetos relacionados</strong>
        @endforelse
    </p>

@endsection


@section('titulo')
    <h2>Titulo da pagina</h2>
@endsection


@section('barra-lateral')
    <h3>Minha barra lateral</h3>
    @parent
@endsection