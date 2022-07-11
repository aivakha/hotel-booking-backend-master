<?php

namespace App\Http\Controllers\API\Room;

use App\Http\Controllers\Controller;
use App\Http\Resources\Room\RoomResource;
use App\Models\Room;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke($slug) {
        $room = Room::where('slug', $slug)->first();

        return new RoomResource($room);
    }
}
