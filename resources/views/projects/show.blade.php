@extends('layouts.app')

@section('titulo-pagina')
    <h1>Detalhes do projeto</h1>
@endsection

@section('content')
    <div class="row">
      <div class="col-md-12">
        <p>O id do projeto é {{ $project->id }}</p>
        <p>O nome do projeto é {{ $project->name }}</p>
        <p>O custo do projeto é {{ $project->cost }}</p>
        <p>O descrição do projeto é {{ $project->description }}</p>

          <p>
          @forelse($project->tasks as $task)
              <p>Tarefa id: {{$task->id}}</p>
          @empty
              <p>Sem tarefas cadastradas!</p>
          @endforelse
          </p>

        <a href="{{ route('projects.index') }}">Volta para a lista de clientes</a>
      </div>
    </div>
@endsection


