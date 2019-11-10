<?php


namespace App\Repositories\Implementations;

use App\Repositories\Interfaces\TaskRepositoryInterface;
use App\Repositories\Base\QueryBuilderRepository;
use Illuminate\Support\Facades\DB;

class TaskRepository extends QueryBuilderRepository implements TaskRepositoryInterface
{
    protected $table = 'tasks';

    public function getBySubject($subject){

        $subject = '%' . $subject . '%';

        return DB::table($this->table)->where('subject', 'like', $subject)->get();
    }

}