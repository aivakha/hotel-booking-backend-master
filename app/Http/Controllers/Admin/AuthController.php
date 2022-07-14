<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginStore;
use App\Http\Requests\Auth\RegistrationStore;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use Notifiable;

    public function registerForm() {
        return view('auth.register');
    }

    public function register(RegistrationStore $request) {
        $data = $request->validated();

        $user = User::add($data);
        $user->generatePassword($request->get('password'));

        if ($user) {
            event(new Registered($user));

            if ($request->get('is_checked')) {
                $user->assignRole('advance_user');
            } else {
                $user->assignRole('simple_user');
            }

            Auth::login($user);

            return redirect()->route('verification.notice');
        }

        return redirect()->route('login')->with('success', 'Успішно оновлено!');
    }

    public function loginForm() {
        return view('auth.login');
    }

    public function login(LoginStore $request) {
        if (Auth::attempt(['email' => $request->get('email'), 'password' => $request->get('password')])) {
            return redirect()->route('dashboard');
        }

        return redirect()->back()->with('success', 'Не правильний логін або пароль');
    }

    public function logout() {
        Auth::logout();

        return redirect()->to('/');
    }
}
