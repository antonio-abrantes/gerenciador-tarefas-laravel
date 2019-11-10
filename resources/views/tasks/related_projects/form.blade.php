@if (!$task->made)
    <div class="row">
        <div class="col-md-12 text-center">

            <h3>Relacionar Projeto</h3>

            <form class="form-inline" method="post" action="{{ route('tasks.project_attach', $task) }}">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="project_id">Projeto</label>
                    <select name="project_id" class="form-control">
                        @foreach ($projects as $project)
                            <option value="{{ $project->id }}">{{ $project->name }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-default">Relacionar projeto a tarefa</button>
            </form>
        </div>
    </div>
@endif