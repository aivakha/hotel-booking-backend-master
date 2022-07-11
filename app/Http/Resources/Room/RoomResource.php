<?php

namespace App\Http\Resources\Room;

use App\Http\Resources\Apartment\ApartmentResource;
use App\Http\Resources\BedType\BedTypeResource;
use App\Http\Resources\Feature\FeatureResource;
use Illuminate\Http\Resources\Json\JsonResource;

class RoomResource extends JsonResource
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
            'description' => $this->description,
            'preview_image' => $this->getImage(),
            'gallery' => $this->getGallery(),
            'created_at' => $this->created_at,
            'price' => $this->price,
            'features' => FeatureResource::collection($this->features),
            'bed_types' => BedTypeResource::collection($this->bedTypes),
            'apartment' => new ApartmentResource($this->apartment),
        ];
    }
}
