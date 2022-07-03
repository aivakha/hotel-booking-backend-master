<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BedType extends Model
{
    use HasFactory;

    protected $fillable = ['title'];

    public function rooms()
    {
        return $this->belongsToMany(
            Room::class,
            'room_bed_types',
            'bed_type_id',
            'room_id',
        );
    }
}
