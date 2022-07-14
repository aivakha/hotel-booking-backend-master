<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Feature extends Model
{
    use HasFactory;

    protected $fillable = ['title'];

    public function rooms()
    {
        return $this->belongsToMany(
            Room::class,
            'room_features',
            'feature_id',
            'room_id',
        );
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public static function add($fields)
    {
        $feature = new static;
        $feature->fill($fields);
        $feature->user_id = Auth::user()->id;
        $feature->save();

        return $feature;
    }

}
