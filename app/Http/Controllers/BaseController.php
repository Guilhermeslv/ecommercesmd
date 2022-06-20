<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Contracts\ControllerInterface;

abstract class BaseController implements ControllerInterface
{
    protected Model $entity;

    public function __construct()
    {
        $this->entity = $this->resolveEntity();
    }

    public function resolveEntity()
    {
     return app($this->entity());
    }

    public function getAll(): Collection
    {
        return $this->entity->all();
    }

    public function getOne(int $id): Model
    {
        return $this->entity->findOrFail($id);
    }

    public function store(Request $request)
    {
        $this->entity->create($request->all());
        return $this->index();
    }

    public function update(Request $request, int $id)
    {
        $this->entity->findOrFail($id)->update($request->all());
        return $this->index();
    }

    public function destroy(int $id)
    {
        $this->entity->destroy($id);
        return $this->index();
    }
}
