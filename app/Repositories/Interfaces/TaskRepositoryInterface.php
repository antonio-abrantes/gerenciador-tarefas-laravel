<?php

namespace App\Repositories\Interfaces;


interface TaskRepositoryInterface
{
    public function getBySubject($subject);
    public function getByIds(array $ids);
}