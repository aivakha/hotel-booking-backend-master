<?php

namespace App\Http\Controllers\API\Room;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\ApartmentType;
use App\Models\BedType;
use App\Models\Distance;
use App\Models\Feature;
use App\Models\LeisureActivity;
use App\Models\Meal;
use App\Models\Room;
use Illuminate\Http\Request;

class FilterListController extends Controller
{
    public function __invoke(Room $room) {
        $meals = Meal::all();
        $apartmentTypes = ApartmentType::all();
        $bedTypes = BedType::all();
        $leisureActivities = LeisureActivity::all();
        $starRates = Apartment::all(['star_rate']);
        $features = Feature::all();
        $distances = Distance::all();
        // price
        $maxPrice = Room::orderBy('price', 'DESC')->first()->price;
        $minPrice = Room::orderBy('price', 'ASC')->first()->price;

        $result = [
            'meals' => $meals,
            'apartment_types' => $apartmentTypes,
            'bed_types' => $bedTypes,
            'leisure_activities' => $leisureActivities,
            'star_rates' => $starRates,
            'features' => $features,
            'distances' => $distances,
            'price' => [
                'max' => $maxPrice,
                'min' => $minPrice,
            ],
        ];

        // dd($result);

        return response()->json($result);
    }
}
