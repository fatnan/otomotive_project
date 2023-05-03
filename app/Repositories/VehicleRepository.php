<?php

namespace App\Repositories;

use App\Models\Vehicle;

class VehicleRepository
{
    protected $vehicle;

    public function __construct(Vehicle $vehicle)
    {
        $this->vehicle = $vehicle;
    }

    public function all()
    {
        // dd($this->vehicle);
        return $this->vehicle->all();
    }

    public function find($id)
    {
        return $this->vehicle->findOrFail($id);
    }

    public function create($data)
    {
        return $this->vehicle->create($data);
    }

    public function update($id, $data)
    {
        $vehicle = $this->vehicle->findOrFail($id);
        $vehicle->update($data);
        return $vehicle;
    }

    public function delete($id)
    {
        $vehicle = $this->vehicle->findOrFail($id);
        $vehicle->delete();
    }
}
