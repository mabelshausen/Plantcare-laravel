<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function all() {
        return Room::all();
    }

    public function show($id) {
        return Room::find($id);
    }

    public function add(Request $request) {
        $room = Room::create($request->all());
        return $room->id;
    }

    public function edit(Request $request, $id) {
        $room = Room::findOrFail($id);
        $room->update($request->all());

        return $room->id;
    }

    public function delete($id) {
        $room = Room::findOrFail($id);
        $room->delete();

        return 204;
    }
}
