@extends('layouts.app')

@section('titulo-pagina')
    <h1>Lista de Clientes</h1>
@endsection

@section('content')



        <div class="row">
            <div class="col-md-12">

                <table class="table table-striped">
                    <tread>
                        <tr>
                            <th>Id</th>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Ações</th>
                        </tr>
                    </tread>
                    <tbody>
                    @foreach($clientes as $client)
                    <tr>
                        <td>{{$client->id }}</td>
                        <td><a href="{{route('clients.show', $client->id)}}">{{$client->name }}</a></td>
                        <td>{{$client->email }}</td>
                        <td>
                            @can('update-client', $client)
                                <a style="height: 30px; width: 70px" class="btn btn-success" href="{{ route('clients.edit', $client->id) }}">Editar</a>

                                <form style="display: inline" action="{{ route('clients.destroy', $client->id) }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button style="height: 30px; width: 70px" class="btn btn-danger" type="submit"
                                            onclick="return confirm('Deseja excluir o registro?')">Deletar</button>
                                </form>
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>

                <div class="row text-center">
                    {{ $clientes->links() }}
                </div>

            </div>
        </div>
         <a href="{{ route('clients.create') }}">Cadastrar Clientes</a>
        <br>

         <a href="{{ url('clients/pdf') }}">Baixar Listagem</a>

@endsection


@section('titulo')
    <h2>Titulo da pagina</h2>
@endsection


@section('barra-lateral')
    <h3>Minha barra lateral</h3>
    @parent
@endsection