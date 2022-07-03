<?php

namespace App\Models;

use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Room extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = ['title', 'description', 'date_from', 'date_to', 'apartment_id'];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function apartment()
    {
        return $this->belongsTo(Apartment::class);
    }

    public function gallery()
    {
        return $this->hasMany(RoomGallery::class)->get();
    }

    public function features()
    {
        return $this->belongsToMany( // многие ко многим
            Feature::class,
            'room_features',
            'room_id',
            'feature_id'
        );
    }

    public function bedTypes()
    {
        return $this->belongsToMany( // многие ко многим
            BedType::class,
            'room_bed_types',
            'room_id',
            'bed_type_id'
        );
    }



    public static function add($fields)
    {
        $room = new static;

        $date_from = Carbon::now()->format('d-m-Y');
        $date_to = Carbon::now()->addYear(10)->format('d-m-Y');
        $dateRange = ['date_from' => $date_from, 'date_to' => $date_to];

        $data = array_merge($fields, $dateRange, ['apartment_id' => 999]);
        $room->fill($data);
        $room->save();

        return $room;
    }

    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }

    public function setFeatures($ids)
    {
        if ($ids == null) { return; }

        $this->features()->sync($ids);
    }

    public function setBedTypes($ids)
    {
        if ($ids == null) { return; }

        $this->bedTypes()->sync($ids);
    }

    public function remove()
    {
        $this->removeImage();
        $this->removeGallery();
        $this->features()->detach();
        $this->bedTypes()->detach();

        $this->delete();
    }

    public function removeImage()
    {
        if ($this->preview_image != null)
        {
            Storage::delete('/public/uploads/rooms/'.$this->id.'/'.$this->preview_image);
            if (empty(Storage::allFiles("/public/uploads/rooms/{$this->id}"))) {
                Storage::deleteDirectory("/public/uploads/rooms/{$this->id}");
            }
        }
    }

    public function uploadImage($preview_image)
    {

        if ($preview_image == null) { return; }

        $this->removeImage();
        $filename = Str::random(10) . '.' . $preview_image->extension();
        $preview_image->storeAs("public/uploads/rooms/". $this->id, $filename);
        $this->preview_image = $filename;
        $this->save();
    }

    public function getImage(): string
    {
        if ($this->preview_image != null)
        {
            return "/storage/uploads/rooms/{$this->id}/{$this->preview_image}";
        } else
        {
            return '';
        }
    }


    public function uploadGallery($gallery)
    {
        if (!$gallery)
        {
            return;
        }

        $this->removeGallery();

        $images = [];
        // populate in FileSystem
        foreach ($gallery as $image) {
            $filename = Str::random(10) . '.' . $image->extension();
            $image->storeAs("public/uploads/rooms/{$this->id}/gallery/", $filename);
            $images[] = $filename;

        }
        $this->save();

        // populate in DB
        foreach($images as $image) {
            $room_gallery = [
                'image' => $image,
                'room_id' => $this->id,
            ];

            RoomGallery::create($room_gallery);
        }

    }

    public function removeGallery()
    {
        if ($this->gallery()->isNotEmpty())
        {
            foreach($this->gallery() as $item) {
                Storage::delete("/public/uploads/rooms/{$this->id}/gallery/{$item->image}");

                if (empty(Storage::allFiles("/public/uploads/rooms/{$this->id}"))) {
                    Storage::deleteDirectory("/public/uploads/rooms/{$this->id}");
                }
            }
            // delete records from DB
            $ids = RoomGallery::where('room_id', '=', $this->id)->pluck('id')->toArray();

            foreach ($ids as $id) {
                RoomGallery::find($id)->delete();
            }
        }

    }

    public function getGallery(): array
    {
        if (!empty($this->gallery()))
        {
            $paths = [];
            foreach ($this->gallery() as $item) {
                $path = "/storage/uploads/rooms/{$this->id}/gallery/{$item->image}";
                $paths[] = $path;
            }
            return $paths;
        } else
        {
            return [];
        }
    }



}
