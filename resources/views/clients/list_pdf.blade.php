@extends('layouts.pdf')


@section('content')
    <table class="table table-striped">
        <tread>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>E-mail</th>
            </tr>
        </tread>
        <tbody>
        @forelse($clients as $client)
            <tr>
                <td>{{$client->id }}</td>
                <td>{{$client->name }}</td>
                <td>{{$client->email }}</td>
            </tr>
        @empty
            <tr><td>Nenhum cliente cadastrado</td></tr>
        @endforelse
        </tbody>
    </table>
@endsection