<?php

namespace App\Http\Controllers\ExtraActions;

use App\Client;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\TaskRepositoryInterface;
use Illuminate\Http\Request;

class TaskSearch extends Controller{

    /** *
     * Show the profile for the given user
     *  Exemplo de busca: http://tasks.test/tasks/search/projeto
     * @return Response
     */
    public function __invoke(TaskRepositoryInterface $taskRepository, Request $request)
    {
        return $taskRepository->getBySubject($request->search);
    }
}