<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Room\StoreRequest;
use App\Http\Requests\Room\UpdateRequest;
use App\Models\Apartment;
use App\Models\ApartmentType;
use App\Models\BedType;
use App\Models\Feature;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::all();
        // $rooms = Room::with('gallery')->get();

        return view('admin.rooms.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $features = Feature::pluck('title', 'id')->all();
        $bed_types = BedType::pluck('title', 'id')->all();
        $apartments = Apartment::pluck('title', 'id')->all();

        return view('admin.rooms.create', compact('features', 'bed_types', 'apartments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $room = Room::add($data);

        if ($request->hasFile('preview_image')) {
            $room->uploadImage($request->file('preview_image'));
        }

        if ($request->hasFile('gallery')) {
            $room->uploadGallery($request->file('gallery'));
        }

        $room->setFeatures($request->get('features'));
        $room->setBedTypes($request->get('bed_types'));

        return redirect()->route('rooms.index')->with('success', 'Успішно добавлено!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $room = Room::find($id);
        $features = Feature::pluck('title', 'id')->all();
        $selectedFeatures = $room->features->pluck('id')->all();
        $bedTypes = BedType::pluck('title', 'id')->all();
        $selectedBedTypes = $room->bedTypes->pluck('id')->all();

        $apartments = Apartment::pluck('title', 'id')->all();
        $selectedApartment = $room->apartment()->pluck('id')->all();

        return view('admin.rooms.edit', compact('room', 'features', 'selectedFeatures', 'bedTypes', 'selectedBedTypes', 'apartments', 'selectedApartment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        $data = $request->validated();

        $room = Room::find($id);
        $room->edit($data);

        if ($request->hasFile('preview_image')) {
            $room->uploadImage($request->file('preview_image'));
        }

        if ($request->hasFile('gallery')) {
            $room->uploadGallery($request->file('gallery'));
        }

        $room->updateFeatures($request->get('features'));
        $room->updateBedTypes($request->get('bed_types'));

        return redirect()->route('rooms.index')->with('success', 'Успішно оновлено!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Room::find($id)->remove();

        return redirect()->route('rooms.index')->with('success', 'Успішно видалено!');
    }
}
