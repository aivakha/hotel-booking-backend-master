<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Apartment extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = [
        'title',
        'full_description',
        'short_description',
        'address',
        'star_rate',
        'city_id',
        'manager_id',
        'distance_id',
        'type_id'
    ];

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

    public function bookings() {
        return $this->hasMany(Booking::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

    public function gallery()
    {
        return $this->hasMany(ApartmentGallery::class)->get();
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function type()
    {
        return $this->belongsTo(ApartmentType::class);
    }

    public function distance()
    {
        return $this->belongsTo(Distance::class);
    }

    public function manager()
    {
        return $this->belongsTo(Manager::class);
    }

    public function star_rate()
    {
        return $this->star_rate;
    }

    public function meals()
    {
        return $this->belongsToMany( // многие ко многим
            Meal::class,
            'apartment_meals',
            'apartment_id',
            'meal_id'
        );
    }

    public function leisureActivities()
    {
        return $this->belongsToMany( // многие ко многим
            LeisureActivity::class,
            'apartment_leisure_activities',
            'apartment_id',
            'leisure_activity_id'
        );
    }

    // methods
    public static function add($fields)
    {

        $apartment = new static;
        $apartment->fill($fields);
        $apartment->save();

        return $apartment;
    }

    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }

    public function setMeals($ids)
    {
        if ($ids == null) { return; }

        $this->meals()->sync($ids);
    }

    public function setLeisureActivities($ids)
    {
        if ($ids == null) { return; }

        $this->leisureActivities()->sync($ids);
    }

    public function updateMeals($ids)
    {
        if ($ids == null) {
            return $this->meals()->detach();
        }

        $this->meals()->sync($ids);
    }

    public function updateLeisureActivities($ids)
    {
        if ($ids == null) {
            return $this->leisureActivities()->detach();
        }

        $this->leisureActivities()->sync($ids);
    }

    public function remove()
    {
        $this->removeImage();
        $this->removeGallery();
        $this->meals()->detach();
        $this->leisureActivities()->detach();

        $this->delete();
    }

    public function removeImage()
    {
        if ($this->preview_image != null)
        {
            Storage::delete('/public/uploads/apartments/'.$this->id.'/'.$this->preview_image);
            if (empty(Storage::allFiles("/public/uploads/apartments/{$this->id}"))) {
                Storage::deleteDirectory("/public/uploads/apartments/{$this->id}");
            }
        }
    }

    public function uploadImage($preview_image)
    {

        if ($preview_image == null) { return; }

        $this->removeImage();
        $filename = Str::random(10) . '.' . $preview_image->extension();
        $preview_image->storeAs("/public/uploads/apartments/". $this->id, $filename);
        $this->preview_image = $filename;
        $this->save();
    }

    public function getImage(): string
    {
        if ($this->preview_image != null)
        {
            return "/storage/uploads/apartments/{$this->id}/{$this->preview_image}";
        } else
        {
            return '';
        }
    }

    public function uploadGallery($gallery)
    {
        if (!$gallery) { return; }

        $this->removeGallery();

        $images = [];
        // populate in FileSystem
        foreach ($gallery as $image) {
            $filename = Str::random(10) . '.' . $image->extension();
            $image->storeAs("public/uploads/apartments/{$this->id}/gallery/", $filename);
            $images[] = $filename;

        }
        $this->save();

        // populate in DB
        foreach($images as $image) {
            $apartment_gallery = [
                'image' => $image,
                'apartment_id' => $this->id,
            ];

            ApartmentGallery::create($apartment_gallery);
        }
    }

    public function removeGallery()
    {
        if ($this->gallery()->isNotEmpty())
        {
            foreach($this->gallery() as $item) {
                Storage::delete("/public/uploads/apartments/{$this->id}/gallery/{$item->image}");

                if (empty(Storage::allFiles("/public/uploads/apartments/{$this->id}"))) {
                    Storage::deleteDirectory("/public/uploads/apartments/{$this->id}");
                }
            }
            // delete records from DB
            $ids = ApartmentGallery::where('apartment_id', '=', $this->id)->pluck('id')->toArray();

            foreach ($ids as $id) {
                ApartmentGallery::find($id)->delete();
            }
        }
    }

    public function getGallery(): array
    {
        if (!empty($this->gallery()))
        {
            $paths = [];
            foreach ($this->gallery() as $item) {
                $path = "/storage/uploads/apartments/{$this->id}/gallery/{$item->image}";
                $paths[] = $path;
            }
            return $paths;
        } else
        {
            return [];
        }
    }
}
