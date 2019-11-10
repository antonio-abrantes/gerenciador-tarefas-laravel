@extends('layouts.app')

@section('titulo-pagina')
    <h1>Lista de Tarefas</h1>
@endsection

@section('content')
    <div class="row">
        
        <div class="form-group pull-left">
            <input type="text" id="task_search" class="form-control" placeholder="Procure pelo assunto">
        </div>
        
        
      <div class="col-md-12">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Id</th>
              <th>Assunto</th>
              <th>Executada</th>
              <th>Descrição</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody id="task_list">
            @forelse ($tasks as $task)
              <tr>
                <td>{{ $task->id }}</td>
                <td>
                  <a href="{{ route('tasks.show', $task->id) }}">
                    {{ $task->subject }}
                  </a>
                </td>
                <td>{{ $task->made ? 'Sim' : 'Não' }}</td>
                <td>{{ $task->description }}</td>
                <td>
                    <a class="btn btn-success"  href="{{ route('tasks.edit', $task->id) }}">Editar</a>

                    <form style="display: inline" action="{{ route('tasks.destroy', $task->id) }}" method="post">
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}

                      <button type="submit" class="btn btn-danger" 
                          onclick="return confirm('Tem certeza que deseja remover o tarefa?')">Deletar</button>
                    </form>
                </td>
              </tr>
            @empty
              <tr><td>Nenhuma tarefa cadastrada</td></tr>
            @endforelse
          </tbody>
        </table>

          <div class="row text-center">
              {{ $tasks->links() }}
          </div>

        <a href="{{ route('tasks.create') }}">Criar Tarefa</a>
      </div>
    </div>
@endsection


