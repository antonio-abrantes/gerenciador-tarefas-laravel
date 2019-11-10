<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\TaskRepositoryInterface;

class ToDoTasksController extends Controller
{
    public function __construct(TaskRepositoryInterface $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function index()
    {
        $ids = session('todotasks');

        $tasks = $this->taskRepository->getByIds($ids);

        return view('todo_tasks.index', compact('tasks'));
    }

    public function made($id)
    {
        $result = $this->taskRepository->update($id,[
            'made' => 1
        ]);

        if($result){
            return redirect()->route('tasks.todo_destroy', $id);
        }

        return back()->with('error', 'Erro ao marcar como executada!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        if($this->taskRepository->find($id)){
            $request->session()->push('todotasks', $id);
            return back();
        }

        //return redirect()->route('clients.index');
        return back()->with('error', 'Não foi possivel adicionar!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ids = session('todotasks');

        $ids = array_where($ids, function ($value, $key) use ($id){
            return $value != $id;
        });

        session(['todotasks' => $ids]);

//        return redirect()->route('clients.index');
        return back();
    }
}
