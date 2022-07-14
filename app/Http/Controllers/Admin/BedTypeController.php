<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BedType\StoreRequest;
use App\Http\Requests\BedType\UpdateRequest;
use App\Models\BedType;
use Illuminate\Http\Request;

class BedTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('index', [self::class]);

        $bed_types = BedType::all();

        return view('admin.bed-types.index', compact('bed_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', [self::class]);

        return view('admin.bed-types.create');
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
        BedType::add($data);

        return redirect()->route('bed-types.index')->with('success', 'Успішно добавлено!');
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
        $bed_type = BedType::find($id);

        $this->authorize('view', $bed_type);

        return view('admin.bed-types.edit', compact('bed_type'));
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
        $bed_type = BedType::find($id);
        $this->authorize('update', $bed_type);
        $bed_type->update($data);

        return redirect()->route('bed-types.index')->with('success', 'Успішно оновлено!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bed_type = BedType::find($id);
        $this->authorize('delete', $bed_type);
        $bed_type->delete();

        return redirect()->route('bed-types.index')->with('success', 'Успішно видалено!');
    }
}
