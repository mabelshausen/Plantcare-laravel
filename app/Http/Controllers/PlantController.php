<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use Illuminate\Http\Request;

class PlantController extends Controller
{
    public function all() {
        return Plant::all();
    }

    public function show($id) {
        return Plant::find($id);
    }

    public function add(Request $request) {
        return Plant::create($request->all());
    }

    public function edit(Request $request, $id) {
        $plant = Plant::findOrFail($id);
        $plant->update($request->all());

        return $plant;
    }

    public function delete($id) {
        $plant = Plant::findOrFail($id);
        $plant->delete();

        return 204;
    }
}
