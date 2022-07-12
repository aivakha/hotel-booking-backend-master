<?php

namespace App\Http\Controllers\API\Apartment;

use App\Http\Controllers\Controller;
use App\Http\Resources\Apartment\ApartmentResource;
use App\Models\Apartment;
use Illuminate\Http\Request;

class MostViewedController extends Controller
{
    public function __invoke() {
        $apartments = Apartment::inRandomOrder()->limit(3)->get();

        return ApartmentResource::collection($apartments);
    }
}
