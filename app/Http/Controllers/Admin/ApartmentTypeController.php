<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
        $this->authorize('index', [self::class]);

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
        $this->authorize('create', [self::class]);

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

        ApartmentType::add($data);

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

        $this->authorize('view', $apartment_type);

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
        $this->authorize('update', $apartment_type);
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
        $apartment_type = ApartmentType::find($id);

        $this->authorize('delete', $apartment_type);

        $apartment_type->delete();

        return redirect()->route('apartment-types.index')->with('success', 'Успішно видалено!');
    }
}
