<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApartmentGallery extends Model
{
    protected $fillable = ['image', 'apartment_id'];
    use HasFactory;
}
