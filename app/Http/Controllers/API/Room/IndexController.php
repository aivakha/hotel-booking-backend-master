<?php

namespace App\Http\Controllers\API\Room;
use App\Http\Controllers\Controller;
use App\Http\Resources\Room\RoomResource;
use App\Models\Room;

class IndexController extends Controller
{
    public function __invoke() {
        //$data = $request->validated();
//        $filter = app()->make(RoomFilter::class, ['queryParams' => array_filter($data)]);
//
//        dd($filter);
//
//        $rooms = Room::filter($filter)->get();
        $rooms = Room::all();

        return RoomResource::collection($rooms);
    }
}
