<?php

namespace App\Http\Controllers;

use App\Services\CarService;
use Illuminate\Http\Request;

class CarController extends Controller
{
    protected $carService;

    public function __construct(CarService $carService)
    {
        $this->carService = $carService;
    }

    public function index()
    {
        $cars = $this->carService->all();
        return response()->json($cars);
    }

    public function show($id)
    {
        $validator = \Validator::make(['id'=>$id], [
            'id' => 'required|exists:cars,_id',
        ],[
            'id.exists' => 'id invalid'
        ]);

        if ($validator->fails()) {
            return $validator->errors();
        }

        $car = $this->carService->find($id);
        return response()->json($car);
    }

    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'machine' => 'required',
            'passenger_capacity'=> 'required',
            'type'=> 'required'
        ],[
            'id.exists' => 'id invalid'
        ]);

        if ($validator->fails()) {
            return $validator->errors();
        }

        $car = $this->carService->create($request->all());
        return response()->json($car, 201);
    }

    public function update(Request $request, $id)
    {
        $validator = \Validator::make(['id'=>$id], [
            'id' => 'required|exists:cars,_id',
        ],[
            'id.exists' => 'id invalid'
        ]);

        if ($validator->fails()) {
            return $validator->errors();
        }

        $car = $this->carService->update($id, $request->all());
        return response()->json($car, 200);
    }

    public function destroy($id)
    {
        $this->carService->delete($id);
        return response()->json(null, 204);
    }
}
