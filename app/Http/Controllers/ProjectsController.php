<?php

namespace App\Http\Controllers;

use \App\Project;
use \App\Client;
use Illuminate\Http\Request;
use \App\Http\Requests\ProjectRequest;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::paginate(2);

        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::get();

        return view('projects.create', compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {
        $project = Project::create($request->all());

        if ($project) {

//            $client = Client::find($request->client_id);
//            $project->client()->associante($client)->save();


            $request->session()->flash('success', 'Projeto cadastrado com sucesso!');
        } else {
            $request->session()->flash('error', 'Erro ao cadastrar projeto');
        }

        return redirect()->route('projects.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $clients = Client::get();

        return view('projects.edit', compact('project','clients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectRequest $request, Project $project)
    {
        $result = $project->update($request->all());

        if ($result) {
            $request->session()->flash('success', 'Projeto atualizado com sucesso!');
        } else {
            $request->session()->flash('error', 'Erro ao atualizar projeto');
        }

        return redirect()->route('projects.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project, Request $request)
    {
        if ($project->delete()) {
            $request->session()->flash('success', 'Projeto deletado com sucesso!');
        } else {
            $request->session()->flash('error', 'Erro ao deletar projeto');
        }

        return redirect()->route('projects.index');
    }
}
