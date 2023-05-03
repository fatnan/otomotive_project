<?php

namespace App\Http\Controllers;

use App\Services\VehicleService;
use Illuminate\Http\Request;
// use JWTAuth;

class VehicleController extends Controller
{
    protected $vehicleService;

    public function __construct(VehicleService $vehicleService)
    {
        $this->vehicleService = $vehicleService;
    }

    public function index()
    {
        $vehicles = $this->vehicleService->all();
        if($vehicles){
            return response()->json([
                'vehicles' => $vehicles
            ]);
        } else {
            return response()->json([
                'message' => 'no vehicles'
            ]);
        }
        dd($vehicles);
    }

    public function show($id)
    {
        $vehicle = $this->vehicleService->find($id);
        return response()->json($vehicle);
    }

    public function store(Request $request)
    {
        $vehicle = $this->vehicleService->create($request->all());
        return response()->json($vehicle, 201);
    }

    public function update(Request $request, $id)
    {
        $vehicle = $this->vehicleService->update($id, $request->all());
        return response()->json($vehicle, 200);
    }

    public function destroy($id)
    {
        $this->vehicleService->delete($id);
        return response()->json(null, 204);
    }
}
