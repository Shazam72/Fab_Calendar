<?php

namespace App\Http\Controllers;

use App\Models\Formasuiv;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    public static function getFormations_login()
    {
        $formations = Formasuiv::all();
        return view('login', [
            'formations' => $formations
        ]);
    }

    public function verify_form()
    {
        if (count(request()->all()) == 4) {
            $validator = Validator::make(request()->all(), [
                'email' => ['email', 'required'],
                'password' => ['required', 'confirmed', 'min:8'],
                'password_confirmation' => ['required']
            ]);
            if ($validator->fails())
                return $validator->errors();

            $this->connect();
        } elseif (count(request()->all()) == 7) {
            $validator = Validator::make(request()->all(), [
                'nom' => ['required'],
                'prenom' => ['required'],
                'email' => ['email', 'required'],
                'formasuiv' => ['required'],
                'password' => ['required', 'confirmed', 'min:8'],
                'password_confirmation' => ['required']
            ]);
            if ($validator->fails())
                return $validator->errors();

            try {
                $isCreated = $this->createAccount();
            } catch (\Throwable $th) {
                die($th);
            }
            return $isCreated;
        }
    }

    public function createAccount()
    {
        $users = array(User::where('email', request('email'))->first());
        if (count($users) != 0)
            die('alreadyInDB');
        else {
            User::create([
                'nom' => request('nom'),
                'prenom' => request('prenom'),
                'email' => request('email'),
                'password' => bcrypt(request('password')),
                'formasuiv' => request('formasuiv')
            ]);
            return 'saved';
        }
    }

    public function connect()
    {
        return Auth::attempt([
            'email' => request('email'),
            'password' => request('password')
        ]);
    }
}
