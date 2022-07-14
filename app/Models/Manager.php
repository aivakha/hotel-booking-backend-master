<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class Manager extends Model
{
    use HasFactory, Notifiable;

    protected $guarded = [];

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
        $manager = new static;
        $manager->fill($fields);
        $manager->user_id = Auth::user()->id;
        $manager->save();

        return $manager;
    }
}
