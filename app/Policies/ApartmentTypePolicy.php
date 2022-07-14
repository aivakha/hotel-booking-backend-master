<?php

namespace App\Policies;

use App\Models\ApartmentType;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ApartmentTypePolicy
{
    use HandlesAuthorization;

    public function index(?User $user)
    {
        if ($user->hasRole('advance_user')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ApartmentType  $apartmentType
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, ApartmentType $apartmentType)
    {
        return $user->id == $apartmentType->user_id;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        if ($user->hasRole('advance_user')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ApartmentType  $apartmentType
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, ApartmentType $apartmentType)
    {
        return $user->id == $apartmentType->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ApartmentType  $apartmentType
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, ApartmentType $apartmentType)
    {
        return $user->id == $apartmentType->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ApartmentType  $apartmentType
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, ApartmentType $apartmentType)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ApartmentType  $apartmentType
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, ApartmentType $apartmentType)
    {
        //
    }
}
