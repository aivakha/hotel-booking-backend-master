<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Meal extends Model
{
    use HasFactory;

    protected $fillable = ['title'];

    public function apartments()
    {
        return $this->belongsToMany(
            Meal::class,
            'apartment_meals',
            'meal_id',
            'apartment_id',
        );
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public static function add($fields)
    {
        $meal = new static;
        $meal->fill($fields);
        $meal->user_id = Auth::user()->id;
        $meal->save();

        return $meal;
    }
}
