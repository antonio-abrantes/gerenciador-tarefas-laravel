<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TaskProjectController extends Controller
{
    public function attach(Task $task, Request $request)
    {
        $task->projects()->attach($request->project_id);

        return back()->with('success', 'Projeto relacionado a tarefa com sucesso!');
    }

    public function detach(Task $task, $project_id)
    {
        $task->projects()->detach($project_id);

        return back()->with('success', 'Projeto removido da tarefa com sucesso!');
    }
}
