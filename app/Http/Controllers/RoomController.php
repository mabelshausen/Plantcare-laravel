<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Modules\Rooms\Services\RoomService;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function all() {
        return Room::all();
    }

    public function show($id) {
        return Room::find($id);
    }

    public function add(Request $request, RoomService $service) {
        $data = $request->all();
        $result = $service->add($data);

        if($service->hasErrors())
            return response(['status' => 400, 'message' => 'Unable to add data', 'errors' => $service->getErrors() ]);

        return $result;
    }

    public function edit(Request $request, $id, RoomService $service) {
        $data = $request->all();
        $result = $service->edit($data, $id);

        if($service->hasErrors())
            return response(['status' => 400, 'message' => 'Unable to edit room', 'errors' => $service->getErrors() ]);

        return $result;
    }

    public function delete($id) {
        $room = Room::findOrFail($id);
        $room->delete();

        return 204;
    }
}
