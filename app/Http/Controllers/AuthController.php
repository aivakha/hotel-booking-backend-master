<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginStore;
use App\Http\Requests\Auth\RegistrationStore;
use App\Models\User;
use App\Notifications\VerifyEmailNotification;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use Notifiable;

    public function registrationForm() {
        return view('client.auth.registration');
    }

    public function registration(RegistrationStore $request) {
        $data = $request->validated();

        $user = User::add($data);
        $user->generatePassword($request->get('password'));

        if ($user) {
            event(new Registered($user));
            // $user->notify(new VerifyEmailNotification());
            $user->assignRole('simple_user');

            Auth::login($user);

            return redirect()->route('verification.notice');
        }

        return redirect()->route('login');
    }

    public function loginForm() {
        return view('client.auth.login');
    }

    public function login(LoginStore $request) {
        if (Auth::attempt(['email' => $request->get('email'), 'password' => $request->get('password')])) {
            return redirect('/');
        }

        return redirect()->back()->with('success', 'Не правильний логін або пароль');
    }

    public function logout() {
        Auth::logout();

        return redirect()->route('login');
    }
}
