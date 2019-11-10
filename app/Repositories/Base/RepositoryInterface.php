<?php

namespace App\Repositories\Base;


interface RepositoryInterface
{

    public function getAll(int $page);
    public function find(int $id);
    public function create(array $data);
    public function update(int $id, array $data);
    public function delete(int $id);

}