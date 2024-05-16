<?php

namespace App\Repositories;

use App\Contracts\RepositoryInterface;
use Illuminate\Support\Facades\Auth;

class Repository implements RepositoryInterface
{
    public function all($model)
    {
        $query = $model::query();

        return $query->get();
    }

    public function browse($model, $request)
    {
        try {
            $query = $model::query();

            if ($where = $request->where) {
                foreach ($where as $w) {
                    $query->where($w['key'], $w['value']);
                }
            }

            if ($whereIn = $request->whereIn) {
                foreach ($whereIn as $w) {
                    $query->whereIn($w['key'], $w['value']);
                }
            }

            if ($sort = json_decode($request->sort)) {
                foreach ($sort as $s) {
                    $query->orderBy($s->key, $s->order);
                }
            }

            if (!empty($request->search)) {
                $query->where($request->search_by, 'like', '%' . $request->search . '%');
            }

            if (!empty($request->with)) {
                $query->with($request->with);
            }

            if (!empty($request->withExists)) {
                $query->withExists($request->withExists);
            }

            return $query->paginate($request->per_page);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function find($model, $id)
    {
        return $model::find($id);
    }

    public function save($model, array $data, $id)
    {

        if ($id !== null) {
            $data['updated_by'] = auth()->user()->id;

            $model = $model::find($id);

            if ($model) {
                $model->update($data);
                return $model;
            }

            return null;
        } else {
            $data['created_by'] = auth()->user()->id;
            $data['updated_by'] = auth()->user()->id;

            return $model::create($data);
        }
    }

    public function add($model, array $data)
    {
        return $model::create($data);
    }

    public function edit($model, $id, array $data)
    {
        $editData = $model::find($id);
        if ($editData) {
            $editData->update($data);
            return $editData;
        }
        return null;
    }

    public function delete($model, $id)
    {
        $data = $model::find($id);
        if ($data) {
            $data->delete();
            return true;
        }

        return false;
    }

    public function getById($model, $request)
    {
        try {
            $query = $model::query();

            if ($where = $request->where) {
                foreach ($where as $w) {
                    $query->where($w['key'], $w['value']);
                }
            }

            if ($whereIn = $request->whereIn) {
                foreach ($whereIn as $w) {
                    $query->whereIn($w['key'], $w['value']);
                }
            }

            if ($sort = json_decode($request->sort)) {
                foreach ($sort as $s) {
                    $query->orderBy($s->key, $s->order);
                }
            }

            if (!empty($request->search)) {
                $query->where($request->search_by, 'like', '%' . $request->search . '%');
            }

            if (!empty($request->with)) {
                $query->with($request->with);
            }

            if (!empty($request->withExists)) {
                $query->withExists($request->withExists);
            }

            return $query->paginate($request->per_page);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
