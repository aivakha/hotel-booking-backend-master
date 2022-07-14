<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Apartment\StoreRequest;
use App\Http\Requests\Apartment\UpdateRequest;
use App\Models\Apartment;
use App\Models\ApartmentType;
use App\Models\City;
use App\Models\Distance;
use App\Models\LeisureActivity;
use App\Models\Manager;
use App\Models\Meal;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('index', [self::class]);

        $apartments = Helper::getAllbyRole(Apartment::class, 'apartments', 'super_user');

        return view('admin.apartments.index', compact('apartments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', [self::class]);

        $meals = Meal::pluck('title', 'id')->all();
        $leisureActivities = LeisureActivity::pluck('title', 'id')->all();
        $distances = Distance::pluck('title', 'id')->all();
        $cities = City::pluck('title', 'id')->all();
        $types = ApartmentType::pluck('title', 'id')->all();

        $managers = [];
        $user_managers = Helper::getAllbyRole(Manager::class, 'managers', 'super_user');
        foreach($user_managers as $manager) {
            $managers[$manager->id] = "{$manager->last_name} {$manager->first_name}";
        }

        return view('admin.apartments.create', compact('meals', 'leisureActivities', 'distances', 'cities', 'managers', 'types'));
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

        $apartment = Apartment::add($data);

        if ($request->hasFile('preview_image')) {
            $apartment->uploadImage($request->file('preview_image'));
        }

        if ($request->hasFile('gallery')) {
            $apartment->uploadGallery($request->file('gallery'));
        }

        $apartment->setMeals($request->get('meals'));
        $apartment->setLeisureActivities($request->get('leisure_activities'));


        return redirect()->route('apartments.index')->with('success', 'Успішно добавлено!');
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
        $apartment = Apartment::find($id);

        $this->authorize('view', $apartment);

        $meals = Meal::pluck('title', 'id')->all();
        $selectedMeals = $apartment->meals->pluck('id')->all();

        $leisureActivities = LeisureActivity::pluck('title', 'id')->all();
        $selectedLeisureActivities = $apartment->leisureActivities->pluck('id')->all();

        $distances = Distance::pluck('title', 'id')->all();
        $selectedDistance= $apartment->distance()->pluck('id')->all();

        $cities = City::pluck('title', 'id')->all();
        $selectedCity= $apartment->city()->pluck('id')->all();

        $types = ApartmentType::pluck('title', 'id')->all();
        $selectedType= $apartment->type()->pluck('id')->all();

        $star_rate = $apartment->star_rate();

        $managers = [];
        $user_managers = Helper::getAllbyRole(Manager::class, 'managers', 'super_user');
        foreach($user_managers as $manager) {
            $managers[$manager->id] = "{$manager->last_name} {$manager->first_name}";
        }
        $selectedManager= $apartment->manager()->pluck('id')->all();

        return view('admin.apartments.edit', compact('apartment', 'meals', 'selectedMeals', 'leisureActivities', 'selectedLeisureActivities', 'distances', 'selectedDistance', 'cities', 'selectedCity', 'types', 'selectedType', 'star_rate', 'managers', 'selectedManager'));
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

        $apartment = Apartment::find($id);

        $this->authorize('update', $apartment);

        $apartment->edit($data);

        if ($request->hasFile('preview_image')) {
            $apartment->uploadImage($request->file('preview_image'));
        }

        if ($request->hasFile('gallery')) {
            $apartment->uploadGallery($request->file('gallery'));
        }

        $apartment->updateMeals($request->get('meals'));
        $apartment->updateLeisureActivities($request->get('leisure_activities'));

        return redirect()->route('apartments.index')->with('success', 'Успішно оновлено!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Apartment::find($id)->remove();

        return redirect()->route('apartments.index')->with('success', 'Успішно видалено!');
    }
}
