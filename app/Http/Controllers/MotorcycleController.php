<?php

namespace App\Http\Controllers;

use App\Services\MotorcycleService;
use Illuminate\Http\Request;

class MotorcycleController extends Controller
{
    protected $motorcycleService;

    public function __construct(MotorcycleService $motorcycleService)
    {
        $this->motorcycleService = $motorcycleService;
    }

    public function index()
    {
        $motorcycles = $this->motorcycleService->all();
        return response()->json($motorcycles);
    }

    public function show($id)
    {
        $validator = \Validator::make(['id'=>$id], [
            'id' => 'required|exists:motorcycles,_id',
        ],[
            'id.exists' => 'id invalid'
        ]);

        if ($validator->fails()) {
            return $validator->errors();
        }

        $motorcycle = $this->motorcycleService->find($id);
        return response()->json($motorcycle);
    }

    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'machine' => 'required',
            'suspension_type' => 'required',
            'transmission_type' => 'required'
        ]);

        if ($validator->fails()) {
            return $validator->errors();
        }

        $motorcycle = $this->motorcycleService->create($request->all());
        return response()->json($motorcycle, 201);
    }

    public function update(Request $request, $id)
    {
        $validator = \Validator::make(['id'=>$id], [
            'id' => 'required|exists:motorcycles,_id',
        ],[
            'id.exists' => 'id invalid'
        ]);

        if ($validator->fails()) {
            return $validator->errors();
        }

        $motorcycle = $this->motorcycleService->update($id, $request->all());
        return response()->json($motorcycle, 200);
    }

    public function destroy($id)
    {
        $this->motorcycleService->delete($id);
        return response()->json(null, 204);
    }
}
