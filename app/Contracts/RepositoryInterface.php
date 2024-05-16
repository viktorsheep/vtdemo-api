<?php

namespace App\Contracts;

interface RepositoryInterface
{
    public function all($model);
    public function browse($model, $request);
    public function find($model, $id);
    public function save($model, array $data, $id);
    public function add($model, array $data);
    public function edit($model, $id, array $data);
    public function delete($model, $id);
    public function getById($model, $request);
}
