<?php

namespace App\Providers;

use App\Http\Controllers\Admin\ApartmentController;
use App\Http\Controllers\Admin\ApartmentTypeController;
use App\Http\Controllers\Admin\BedTypeController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\DistanceController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\LeisureActivityController;
use App\Http\Controllers\Admin\ManagerController;
use App\Http\Controllers\Admin\MealController;
use App\Http\Controllers\Admin\RoomController;
use App\Models\Apartment;
use App\Models\User;
use App\Policies\ApartmentPolicy;
use App\Policies\ApartmentTypePolicy;
use App\Policies\BedTypePolicy;
use App\Policies\CityPolicy;
use App\Policies\DistancePolicy;
use App\Policies\FeaturePolicy;
use App\Policies\LeisureActivityPolicy;
use App\Policies\ManagerPolicy;
use App\Policies\MealPolicy;
use App\Policies\RoomPolicy;
use App\Policies\UserPolicy;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        ApartmentController::class => ApartmentPolicy::class,
        MealController::class => MealPolicy::class,
        LeisureActivityController::class => LeisureActivityPolicy::class,
        ApartmentTypeController::class => ApartmentTypePolicy::class,
        BedTypeController::class => BedTypePolicy::class,
        FeatureController::class => FeaturePolicy::class,
        CityController::class => CityPolicy::class,
        DistanceController::class => DistancePolicy::class,
        ManagerController::class => ManagerPolicy::class,
        RoomController::class => RoomPolicy::class,
        User::class => UserPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::before(function ($user, $ability) {
            return $user->hasRole('super_user') ? true : null;
        });

        VerifyEmail::toMailUsing(function ($notifiable, $url) {
            return (new MailMessage)
                ->subject('Підтвердження e-mail')
                ->view('emails.email-verify', ['url' => $url]);
        });
    }
}
