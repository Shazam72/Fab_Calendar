<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{

    public static function connect()
    {
        return Auth::attempt([
            'email' => strtolower(request('email')),
            'password' => request('password'),
            'statut_id'=>3
        ]);
    }
    public static function disconnect()
    {
        Auth::logout();
        return redirect(route('home'));
    }
}
