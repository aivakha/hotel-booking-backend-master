<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\LeisureActivity\StoreRequest;
use App\Http\Requests\LeisureActivity\UpdateRequest;
use App\Models\LeisureActivity;
use Illuminate\Http\Request;

class LeisureActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('index', [self::class]);

        $leisure_activities = LeisureActivity::all();

        return view('admin.leisure-activities.index', compact('leisure_activities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', [self::class]);

        return view('admin.leisure-activities.create');
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

        $leisure_activity = LeisureActivity::add($data);
        $leisure_activity->uploadImage($request->file('image'));

        return redirect()->route('leisure-activities.index')->with('success', 'Успішно добавлено!');
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
        $leisure_activity = LeisureActivity::find($id);

        $this->authorize('view', $leisure_activity);

        return view('admin.leisure-activities.edit', compact('leisure_activity'));
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
        $leisure_activity = LeisureActivity::find($id);
        $this->authorize('update', $leisure_activity);
        $leisure_activity->edit($data);
        if ($request->hasFile('image')) {
            $leisure_activity->uploadImage($request->file('image'));
        }

        return redirect()->route('leisure-activities.index')->with('success', 'Успішно оновлено!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $leisureActivity = LeisureActivity::find($id);

        $this->authorize('delete', $leisureActivity);

        $leisureActivity->remove();

        return redirect()->route('leisure-activities.index')->with('success', 'Успішно видалено!');
    }
}
