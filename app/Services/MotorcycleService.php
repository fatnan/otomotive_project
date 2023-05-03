<?php

namespace App\Services;

use App\Repositories\MotorcycleRepository;

class MotorcycleService
{
    protected $motorcycleRepository;

    public function __construct(MotorcycleRepository $motorcycleRepository)
    {
        $this->motorcycleRepository = $motorcycleRepository;
    }

    public function all()
    {
        return $this->motorcycleRepository->all();
    }

    public function find($id)
    {
        return $this->motorcycleRepository->find($id);
    }

    public function create($data)
    {
        return $this->motorcycleRepository->create($data);
    }

    public function update($id, $data)
    {
        return $this->motorcycleRepository->update($id, $data);
    }

    public function delete($id)
    {
        $this->motorcycleRepository->delete($id);
    }
}
