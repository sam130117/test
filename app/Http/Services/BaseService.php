<?php

namespace App\Http\Services;


abstract class BaseService
{
    abstract public function deleteById($id);
    abstract public function getById($id);
    abstract public function getAll();
}
