<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use App\Modules\Plants\Services\PlantService;
use Illuminate\Http\Request;

class PlantController extends Controller
{
    public function all() {
        return Plant::all();
    }

    public function show($id) {
        return Plant::find($id);
    }

    public function add(Request $request, PlantService $service) {
        $data = $request->all();
        $result = $service->add($data);

        if($service->hasErrors())
            return response(['status' => 400, 'message' => 'Unable to add data', 'errors' => $service->getErrors() ]);

        return $result;
    }

    public function edit(Request $request, $id, PlantService $service) {
        $data = $request->all();
        $result = $service->edit($data, $id);

        if($service->hasErrors())
            return response(['status' => 400, 'message' => 'Unable to edit plant', 'errors' => $service->getErrors() ]);

        return $result;
    }

    public function delete($id) {
        $plant = Plant::findOrFail($id);
        $plant->delete();

        return 204;
    }
}
