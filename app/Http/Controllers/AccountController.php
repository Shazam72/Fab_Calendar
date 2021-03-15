<?php

namespace App\Http\Controllers;
use App\Mail\Account_Confirm;
use \App\Models\Formasuiv;
use \App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function confirm_account($token)
    {
        $user = User::where('validation_token', $token)->first();
        if (is_null($user))
            return view('errors.invalid_token');
        else {
            $user->setToken();
            $user->setStatut(1);
            return view('confirmed_email')->with([
                'name'=>$user->prenom
            ]);
        }
    }
    public function login_logup()
    {
        if (Auth::check()) {
            if (Auth::user()->role == "admin")
                return redirect(route('admin_home'));
            else if (Auth::user()->role == "admin")
                return redirect(route('apprenant_home'));
        } else {
            try {
                $formations = Formasuiv::all();
            } catch (\Throwable $e) {
                return view('errors.DB');
            }
            return view('general.login', [
                'formations' => $formations
            ]);
        }
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

            if (UsersController::connect())
                return json_encode(['text' => 'connected', 'link' => route('home')]);
            else
                return json_encode('unavalaible');
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
                $saved=$this->createAccount();
            } catch (\Throwable $th) {
                return view('errors.DB');
            }
            return $saved;
        }
    }

    public function createAccount()
    {
        $users = User::where('email', request('email'))->get()->toArray();
        if (count($users) >= 1)
            die(json_encode('alreadyInDB'));
        else {
            $token=bin2hex(openssl_random_pseudo_bytes(70));
            User::create([
                'nom' => request('nom'),
                'prenom' => request('prenom'),
                'email' => strtolower(request('email')),
                'password' => bcrypt(request('password')),
                'formasuiv_id' => request('formasuiv'),
                'statut'=>0,
                'validation_token'=> $token,
            ]);

            Mail::to(request('email'))->send(new Account_Confirm($token,request('prenom')));
            return json_encode('saved');
        }
    }
}
