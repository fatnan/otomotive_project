<?php

namespace App\Repositories;

use App\Models\Motorcycle;

class MotorcycleRepository
{
    protected $motorcycle;

    public function __construct(Motorcycle $motorcycle)
    {
        $this->motorcycle = $motorcycle;
    }

    public function all()
    {
        return $this->motorcycle->all();
    }

    public function find($id)
    {
        return $this->motorcycle->findOrFail($id);
    }

    public function create($data)
    {
        return $this->motorcycle->create($data);
    }

    public function update($id, $data)
    {
        $motorcycle = $this->motorcycle->findOrFail($id);
        $motorcycle->update($data);
        return $motorcycle;
    }

    public function delete($id)
    {
        $motorcycle = $this->motorcycle->findOrFail($id);
        $motorcycle->delete();
    }
}
