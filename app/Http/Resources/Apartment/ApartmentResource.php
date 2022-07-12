<?php

namespace App\Http\Resources\Apartment;

use App\Http\Resources\ApartmentType\ApartmentTypeResource;
use App\Http\Resources\City\CityResource;
use App\Http\Resources\Comment\CommentResource;
use App\Http\Resources\Distance\DistanceResource;
use App\Http\Resources\LeisureActiviry\LeisureActivityResource;
use App\Http\Resources\Manager\ManagerResource;
use App\Http\Resources\Meal\MealResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ApartmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'slug' => $this->slug,
            'title' => $this->title,
            'full_description' => $this->full_description,
            'short_description' => $this->short_description,
            'address' => $this->address,
            'star_rate' => $this->star_rate,
            'rooms' => $this->rooms,
            'preview_image' => $this->getImage(),
            'gallery' => $this->getGallery(),
            'created_at' => $this->created_at,
            'meals' => MealResource::collection($this->meals),
            'leisureActivities' => LeisureActivityResource::collection($this->leisureActivities),
            'comments' => CommentResource::collection($this->getComments()),
            'average_rate' => $this->averageRate(),
            'distance' => new DistanceResource($this->distance),
            'manager' => new ManagerResource($this->manager),
            'type' => new ApartmentTypeResource($this->type),
            'city' => new CityResource($this->city),
        ];
    }
}
