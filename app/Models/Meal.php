<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    use HasFactory;

    public function apartments()
    {
        return $this->belongsToMany(
            Meal::class,
            'apartment_meals',
            'meal_id',
            'apartment_id',
        );
    }

    protected $fillable = ['title'];
}
