<div class="row">
    <div class="col-md-12">

        <h3 class="text-center">Projetos relacionados</h3>

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
            @forelse ($task->projects as $project)
                <tr>
                    <td>{{ $project->id }}</td>
                    <td>
                        <a href="{{ route('projects.show', $project->id) }}">
                            {{ $project->name }}
                        </a>
                    </td>

                    <td>{{ $project->client->name }}</td>

                    <td>{{ $project->description }}</td>
                    <td>
                        @if (!$task->made)
                            <a class="btn btn-success"  href="{{ route('tasks.project_detach', [$task, $project]) }}">Remover da tarefa</a>
                        @endif
                    </td>
                </tr>
            @empty
                <tr><td>Nenhum projeto relacionado</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>