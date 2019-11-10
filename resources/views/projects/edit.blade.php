@extends('layouts.app')

@section('titulo-pagina')
    <h1>Editar projeto</h1>
@endsection

@section('content')
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
          <form class="form-horizontal" method="post" action="{{ route('projects.update', $project->id) }}">
              {{ csrf_field() }}
              {{ method_field('PUT') }}

              @include('projects.form')
            </form>

        <a href="{{ route('projects.index') }}">Volta para a lista de projetos</a>
      </div>
    </div>
@endsection
