<?php

namespace App\Http\Services;


abstract class BaseService
{
    const LIMIT = 20;

    abstract public function getById($id);
    abstract public function updateById($id, array $data);
    abstract public function deleteById($id);
    abstract public function getAll();
}
