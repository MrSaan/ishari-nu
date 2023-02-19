<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class UserController extends Controller
{
    public function showProfile()
    {
        $user =  new UserResource(auth()->user());
        return Inertia::render('Admin/Profile', [
            'profile' => $user,
        ]);
    }

    public function edit(User $user)
    {
        try {
            if (Request::file('avatar')) {
                Storage::delete('public/' . $user->avatar);
                $image = Request::file('avatar')->store('avatar');

                $user->update([
                    'name' => Request::input('name'),
                    'email' => Request::input('email'),
                    'avatar' => $image,
                ]);
                return redirect('/profile');
            }
            $user->update([
                'name' => Request::input('name'),
                'email' => Request::input('email'),
            ]);

            return redirect('/profile');
        } catch (\Throwable $e) {
            throw $e;
        }
    }
}
