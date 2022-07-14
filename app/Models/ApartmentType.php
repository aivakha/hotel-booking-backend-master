<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ApartmentType extends Model
{
    use HasFactory;

    protected $fillable = ['title'];

    public function apartments()
    {
        return $this->hasMany(Apartment::class); // один ко многим
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public static function add($fields)
    {
        $apartmentType = new static;
        $apartmentType->fill($fields);
        $apartmentType->user_id = Auth::user()->id;
        $apartmentType->save();

        return $apartmentType;
    }
}
