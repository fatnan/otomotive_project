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
    }

    public function show($id)
    {
        $validator = \Validator::make(['id'=>$id], [
            'id' => 'required|exists:vehicles,_id',
        ],[
            'id.exists' => 'id invalid'
        ]);

        if ($validator->fails()) {
            return $validator->errors();
        }

        $vehicle = $this->vehicleService->find($id);
        return response()->json($vehicle);
    }

    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'year' => 'required',
            'color' => 'required' ,
            'price' => 'required'
        ]);

        if ($validator->fails()) {
            return $validator->errors();
        }
        $vehicle = $this->vehicleService->create($request->all());
        return response()->json($vehicle, 201);
    }

    public function update(Request $request, $id)
    {
        $validator = \Validator::make(['id'=>$id], [
            'id' => 'required|exists:vehicles,_id',
        ],[
            'id.exists' => 'id invalid'
        ]);

        if ($validator->fails()) {
            return $validator->errors();
        }

        $vehicle = $this->vehicleService->update($id, $request->all());
        return response()->json($vehicle, 200);
    }

    public function destroy($id)
    {
        $validator = \Validator::make(['id'=>$id], [
            'id' => 'required|exists:vehicles,_id',
        ],[
            'id.exists' => 'id invalid'
        ]);

        if ($validator->fails()) {
            return $validator->errors();
        }

        $this->vehicleService->delete($id);
        return response()->json(null, 204);
    }
}
