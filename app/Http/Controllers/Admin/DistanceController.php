<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Distance\StoreRequest;
use App\Http\Requests\Distance\UpdateRequest;
use App\Models\Distance;
use Illuminate\Http\Request;

class DistanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('index', [self::class]);
        $distances = Distance::all();

        return view('admin.distances.index', compact('distances'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', [self::class]);
        return view('admin.distances.create');
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

        Distance::create($data);

        return redirect()->route('distances.index')->with('success', 'Успішно добавлено!');
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
        $distance = Distance::find($id);
        $this->authorize('update', $distance);

        return view('admin.distances.edit', compact('distance'));
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
        $distance = Distance::find($id);
        $this->authorize('update', $distance);
        $distance->update($data);

        return redirect()->route('distances.index')->with('success', 'Успішно оновлено!');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $distance = Distance::find($id);
        $this->authorize('delete', $distance);
        $distance->delete();

        return redirect()->route('distances.index')->with('success', 'Успішно видалено!');
    }
}
