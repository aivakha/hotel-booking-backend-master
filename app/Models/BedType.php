<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

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

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public static function add($fields)
    {
        $bedType = new static;
        $bedType->fill($fields);
        $bedType->user_id = Auth::user()->id;
        $bedType->save();

        return $bedType;
    }

}
