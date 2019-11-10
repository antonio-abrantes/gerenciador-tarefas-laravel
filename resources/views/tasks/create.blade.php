@extends('layouts.app')

@section('titulo-pagina')
    <h1>Nova Tarefa</h1>
@endsection

@section('content')
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
          <form class="form-horizontal" method="post" action="{{ route('tasks.store') }}">
              {{ csrf_field() }}

              @include('tasks.form')
            </form>

        <a href="{{ route('tasks.index') }}">Volta para a lista de tarefas</a>
      </div>
    </div>
@endsection

