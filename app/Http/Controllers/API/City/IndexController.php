<?php

namespace App\Http\Controllers\API\City;

use App\Http\Controllers\Controller;
use App\Http\Resources\City\CityResource;
use App\Models\City;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(Request $request) {
        // first method
         $cities = City::whereHas('apartments', function (Builder $query) {
         $query->whereIn('city_id', City::pluck('id'));
         })->get();

        // advanced second method
        // $city = $request->get('city');
        // $cities = City::where('title', 'LIKE', '%' . $city. '%')->get();

        return CityResource::collection($cities);
    }
}
