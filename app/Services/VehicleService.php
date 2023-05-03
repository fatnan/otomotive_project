<?php

namespace App\Services;

use App\Repositories\VehicleRepository;

class VehicleService
{
    protected $vehicleRepository;

    public function __construct(VehicleRepository $vehicleRepository)
    {
        $this->vehicleRepository = $vehicleRepository;
    }

    public function all()
    {
        return $this->vehicleRepository->all();
    }

    public function find($id)
    {
        return $this->vehicleRepository->find($id);
    }

    public function create($data)
    {
        return $this->vehicleRepository->create($data);
    }

    public function update($id, $data)
    {
        return $this->vehicleRepository->update($id, $data);
    }

    public function delete($id)
    {
        $this->vehicleRepository->delete($id);
    }
}
