@extends('layouts.app')

@section('titulo-pagina')
    <h1>Novo Projeto</h1>
@endsection

@section('content')
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
          <form class="form-horizontal" method="post" action="{{ route('projects.store') }}">
              {{ csrf_field() }}

              @include('projects.form')
            </form>

        <a href="{{ route('projects.index') }}">Volta para a lista de projetos</a>
      </div>
    </div>
@endsection

