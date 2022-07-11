<?php

namespace App\Http\Controllers\API\Apartment;

use App\Http\Controllers\Controller;
use App\Http\Resources\Apartment\ApartmentResource;
use App\Models\Apartment;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke($slug) {
        $apartment = Apartment::where('slug', $slug)->first();

        return new ApartmentResource($apartment);
    }
}
