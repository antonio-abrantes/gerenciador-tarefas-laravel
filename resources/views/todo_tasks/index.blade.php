@extends('layouts.app')

@section('titulo-pagina')
    <h1>Tarefas a fazer</h1>
@endsection

@section('content')
    <div class="row">

        {{--<div class="form-group pull-left">--}}
            {{--<input type="text" id="task_search" class="form-control" placeholder="Procure pelo assunto">--}}
        {{--</div>--}}


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
                            <a class="btn btn-success"  href="{{ route('tasks.todo_made', $task) }}">Executar</a>
                            <a class="btn btn-danger"  href="{{ route('tasks.todo_destroy', $task) }}">Remover</a>
                        </td>
                    </tr>
                @empty
                    <tr><td>Nenhuma tarefa cadastrada</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection


