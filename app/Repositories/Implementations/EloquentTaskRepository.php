<?php
/**
 * Created by PhpStorm.
 * User: Antonio
 * Date: 22/10/2019
 * Time: 22:36
 */

namespace App\Repositories\Implementations;

use App\Task;
use App\Repositories\Base\EloquentRepository;
use App\Repositories\Interfaces\TaskRepositoryInterface;

class EloquentTaskRepository extends EloquentRepository implements TaskRepositoryInterface
{

    /**
     * @param Task $task
     */
    public function __construct(Task $task)
    {
        $this->model = $task;
    }

    /**
     * procura tarefa por assunto
     *
     * @param [type] $subject
     * @return void
     */
    public function getBySubject($subject)
    {
        $subject = '%' . $subject . '%';

        return $this->model
            ->where('subject', 'like', $subject)
            ->get();
    }

}