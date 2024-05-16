<?php

namespace App\Services;

use App\Contracts\RepositoryInterface;

class AppService
{
    protected $repository;

    public function __construct(RepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function all($model)
    {
        return $this->repository->all($model);
    }

    public function find($model, $id)
    {
        return  $this->repository->find($model, $id);
    }

    public function browse($model, $request)
    {
        return $this->repository->browse($model, $request);
    }


    public function save($model, array $data, $id = null)
    {
        return $this->repository->save($model, $data, $id);
    }

    public function add($model, array $data)
    {
        return $this->repository->add($model, $data);
    }

    public function edit($model, $id, array $data)
    {
        return $this->repository->edit($model, $id, $data);
    }

    public function delete($model, $id)
    {
        return $this->repository->delete($model, $id);
    }

    public function getById($model, $request)
    {
        return $this->repository->getById($model, $request);
    }
}
