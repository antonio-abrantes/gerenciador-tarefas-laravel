@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Sistema de geranciamento de tarefas</h1>
    </div>
    <div class="container">
        <ul class="nav navbar-nav">
            <li><a href="{{ route('clients.index') }}">Clientes</a></li>
            <li><a href="{{ route('projects.index') }}">Projetos</a></li>
            <li><a href="{{ route('tasks.index') }}">Tarefas</a></li>
            <li><a href="{{ route('tasks.todo_index') }}">Tarefas a fazer</a></li>
        </ul>
    </div>
    <div class="container text-center">
        <h2>FUNÇÕES DO SISTEMA</h2>
        <ul class="list-group">
            <li class="list-group-item">Crie novos clientes</li>
            <li class="list-group-item">Adicione projetos para esses clientes</li>
            <li class="list-group-item">Insira tarefas</li>
            <li class="list-group-item">Ao acessar os detalhes da tarefa relacione projetos a ela</li>
            <li class="list-group-item">Coloque a tarefa na lista de tarefas para fazer</li>
            <li class="list-group-item">Marque as tarefas como executada para finalizar</li>
        </ul>
    </div>


@endsection