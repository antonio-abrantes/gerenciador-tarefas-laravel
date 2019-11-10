@extends('layouts.app')

@section('titulo-pagina')
    <h1>Pagina de projetos</h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Cliente</th>
                    <th>Descrição</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($projects as $project)
                    <tr>
                        <td>{{ $project->id }}</td>
                        <td>
                            <a href="{{ route('projects.show', $project->id) }}">
                                {{ $project->name }}
                            </a>
                        </td>
                        <td>
                            {{ $project->client->name }}
                        </td>
                        <td>{{ $project->description }}</td>
                        <td>
                            <a class="btn btn-success"  href="{{ route('projects.edit', $project->id) }}">Editar</a>

                            <form style="display: inline" action="{{ route('projects.destroy', $project->id) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Tem certeza que deseja remover o projeto?')">Deletar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td>Nenhum projeto cadastrado</td></tr>
                @endforelse
                </tbody>
            </table>

            <div class="row text-center">
                {{ $projects->links() }}
            </div>

            <a href="{{ route('projects.create') }}">Criar Projeto</a>
        </div>
    </div>
@endsection


@section('titulo')
    <h2>Titulo da pagina</h2>
@endsection


@section('barra-lateral')
    <h3>Minha barra lateral</h3>
    @parent
@endsection