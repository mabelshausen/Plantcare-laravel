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
        return Room::create($request->all());
    }

    public function edit(Request $request, $id) {
        $room = Room::findOrFail($id);
        $room->update($request->all());

        return $room;
    }

    public function delete($id) {
        $room = Room::findOrFail($id);
        $room->delete();

        return 204;
    }
}
