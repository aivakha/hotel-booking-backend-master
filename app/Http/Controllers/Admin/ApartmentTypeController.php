<?php

namespace App\Http\Admin\Controllers;

use App\Http\Requests\ApartmentType\StoreRequest;
use App\Http\Requests\ApartmentType\UpdateRequest;
use App\Models\ApartmentType;
use Illuminate\Http\Request;

class ApartmentTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apartment_types = ApartmentType::all();

        return view('admin.apartment-types.index', compact('apartment_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.apartment-types.create');
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

        ApartmentType::create($data);

        return redirect()->route('apartment-types.index')->with('success', 'Успішно добавлено!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $apartment_type = ApartmentType::find($id);

        return view('admin.apartment-types.edit', compact('apartment_type'));
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
        $apartment_type = ApartmentType::find($id);
        $apartment_type->update($data);

        return redirect()->route('apartment-types.index')->with('success', 'Успішно оновлено!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ApartmentType::find($id)->delete();

        return redirect()->route('apartment-types.index')->with('success', 'Успішно видалено!');
    }
}
