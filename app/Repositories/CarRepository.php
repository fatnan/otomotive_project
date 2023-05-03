<?php

namespace App\Repositories;

use App\Models\Car;

class CarRepository
{
    protected $car;

    public function __construct(Car $car)
    {
        $this->car = $car;
    }

    public function all()
    {
        return $this->car->all();
    }

    public function find($id)
    {
        return $this->car->findOrFail($id);
    }

    public function create($data)
    {
        return $this->car->create($data);
    }

    public function update($id, $data)
    {
        $car = $this->car->findOrFail($id);
        $car->update($data);
        return $car;
    }

    public function delete($id)
    {
        $car = $this->car->findOrFail($id);
        $car->delete();
    }
}
