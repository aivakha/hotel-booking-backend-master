<?php

namespace App\Http\Controllers\API\Room;
use App\Http\Controllers\Controller;
use App\Http\Filters\RoomFilter;
use App\Http\Requests\API\Room\IndexRequest;
use App\Http\Resources\Room\RoomResource;
use App\Models\Room;

class IndexController extends Controller
{
    public function __invoke(IndexRequest $request) {
        $data = $request->validated();

        $filter = app()->make(RoomFilter::class, ['queryParams' => array_filter($data)]);

        $rooms = Room::filter($filter)->paginate(3, ['*'], 'page', $data['page']);
//        $rooms = Room::all();

        return RoomResource::collection($rooms);
    }
}
