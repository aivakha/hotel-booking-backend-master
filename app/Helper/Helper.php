<?php

namespace App\Helper;

use Illuminate\Support\Facades\Auth;

class Helper
{
    public static function getAllbyRole($model, $relation, $role) {
        $user = Auth::user();

        if ($user->hasRole($role)) {
            $model = $model::all();
        } else {
            $model = $user->$relation;
        }

        return $model;
    }
}
