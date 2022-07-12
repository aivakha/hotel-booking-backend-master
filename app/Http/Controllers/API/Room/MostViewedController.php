<?php

namespace App\Http\Controllers\API\Room;

use App\Http\Controllers\Controller;
use App\Http\Resources\Room\RoomResource;
use App\Models\Room;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class MostViewedController extends Controller
{
    public function __invoke() {
        $rooms = Room::inRandomOrder()->limit(3)->get();

        return RoomResource::collection($rooms);
    }
}
