<?php

namespace App\Repositories\Base;

use Illuminate\Support\Facades\DB;

/**
 * Class QueryBuilderRepository
 * @package App\Repositories\Base
 */
abstract class QueryBuilderRepository implements RepositoryInterface
{

    protected $table;

    public function getAll(int $page = 10){
        return DB::table($this->table)->paginate($page);
    }


    public function find(int $id){
        return DB::table($this->table)->where('id', $id)->first();
    }


    public function create(array $data){
        return DB::table($this->table)->insert($data);
    }


    public function update(int $id, array $data){
        return DB::table($this->table)->where('id', $id)->update($data);
    }


    public function delete(int $id){
        return DB::table($this->table)->where('id', $id)->delete();
    }

}