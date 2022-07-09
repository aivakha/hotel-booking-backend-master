<?php

namespace App\Http\Controllers;

use App\Http\Requests\Account\UpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function edit() {
        $user = Auth::user();

        return view('admin.account.edit', compact('user'));
    }

    public function update(UpdateRequest $request) {
        $data = $request->validated();

        $user = Auth::user();
        $user->update($data);

        return redirect()->back()->with('success', 'Успішно оновлено!');
    }
}
