<?php

namespace App\Services;

use App\Repositories\CarRepository;

class CarService
{
    protected $carRepository;

    public function __construct(CarRepository $carRepository)
    {
        $this->carRepository = $carRepository;
    }

    public function all()
    {
        return $this->carRepository->all();
    }

    public function find($id)
    {
        return $this->carRepository->find($id);
    }

    public function create($data)
    {
        return $this->carRepository->create($data);
    }

    public function update($id, $data)
    {
        return $this->carRepository->update($id, $data);
    }

    public function delete($id)
    {
        $this->carRepository->delete($id);
    }
}
