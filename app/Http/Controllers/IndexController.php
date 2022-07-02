<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Distance;
use App\Models\Feature;
use App\Models\Manager;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index() {

        $features = Feature::all();
        $cities = City::all();
        $distances = Distance::all();
        $managers = Manager::all();

        return view('admin.index', compact('features', 'cities', 'distances', 'managers'));
    }
}
