<?php

namespace App\Http\Controllers;

use App\Http\Requests\Feature\StoreRequest;
use App\Models\Feature;
use Illuminate\Http\Request;
use Illuminate\Session\Store;

class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $features = Feature::all();

        return view('admin.features.index', compact('features'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.features.create');
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

        dd($request->all());

        $feature = Feature::add($data);
        $feature->uploadImage($request->file('image'));

        return redirect()->route('features.index')->with('success', 'Успішно добавлено!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function show(Feature $feature)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Feature  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $feature = Feature::find($id);

        return view('admin.features.edit', compact('feature'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Feature  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRequest $request, $id)
    {
        $data = $request->validated();
        $feature = Feature::find($id);
        $feature->edit($data);
        if ($request->hasFile('image')) {
            $feature->uploadImage($request->file('image'));
        }

        return redirect()->route('features.index')->with('success', 'Успішно збережено!');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Feature $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Feature::find($id)->remove();

        return redirect()->route('features.index')->with('success', 'Успішно видалено!');
    }
}
