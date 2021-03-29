<?php

namespace App\Http\Controllers;

use App\Mail\Account_Confirm;
use \App\Models\Formasuiv;
use App\Models\Reservation_param;
use \App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function existAdmin()
    {
        $user = User::where('role', 'admin')->first();
        if (is_null($user)) {
            return view('general.login')->with([
                'existAdmin' => false
            ]);
        } else
            return redirect(route('login_form'));
    }
    public function confirm_account($token)
    {
        $user = User::where('validation_token', $token)->first();
        if (is_null($user))
            return view('errors.invalid_token');
        elseif ($user->role == "apprenant") {
            $user->setToken();
            $user->setStatut(2);
            $user->setAvatar('avatars/default.png');
            return view('general.confirmed_email')->with([
                'name' => $user->prenom
            ]);
        } elseif ($user->role == "admin") {
            $user->setToken();
            $user->setStatut(3);
            $user->setAvatar('avatars/default.png');
            return view('general.confirmed_email')->with([
                'name' => $user->prenom
            ]);
        }
    }
    public function login_logup()
    {
        if (Auth::check()) {
            if (request()->getUri() == route("modify_info")) {
                return view("general.login")->with([
                    'modify' => true,
                    'formations' => Formasuiv::all()
                ]);
            } else
                return redirect(route(auth()->user()->role . '_home'));
        } else {
            // try {
                $formations = Formasuiv::all();
            // } catch (\Throwable $e) {
            //     return view('errors.DB');
            // }
            return view('general.login', [
                'formations' => $formations
            ]);
        }
    }

    public function verify_form()
    {
        if (route('modify_info') == request()->getUri()) {

            $validator_rules = [
                'email' => ['required', 'email',],
                'prenom' => ['required'],
                'nom' => ['required'],
                'formasuiv' => ['required'],
            ];

            if (auth()->user()->role == "admin")
                $validator_rules = [
                    'email' => ['required', 'email',],
                    'prenom' => ['required'],
                    'nom' => ['required'],
                ];
            $validator = Validator::make(request()->all(), $validator_rules);
            if (request('password')) {
                $validator = Validator::make(request()->all(), [
                    'password' => ['confirmed', 'min:8'],
                    'password_confirmation' => ['required'],
                ]);
            }
            if ($validator->fails())
                return back()->withErrors($validator->errors());

            // try {
                $this->modify_info();
            // } catch (\Throwable $th) {
            //     return view('errors.DB');
            // }
            return redirect(route(auth()->user()->role . '_profile'));
        } elseif (route('login_form') == request()->getUri()) {
            $validator = Validator::make(request()->all(), [
                'email' => ['email', 'required'],
                'password' => ['required', 'confirmed', 'min:8'],
                'password_confirmation' => ['required']
            ]);
            if ($validator->fails())
                return $validator->errors();

            if (UsersController::connect()) {




            Reservation_param::where('statut_id','5');
















                if (auth()->user()->role == "admin")
                    return json_encode(['text' => 'connected', 'link' => route('admin_home')]);
                else
                    return json_encode(['text' => 'connected', 'link' => route('apprenant_home')]);
            } else
                return json_encode('unavalaible');
        } elseif (route('logup_form') == request()->getUri()) {
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

            // try {
                $saved = $this->createApprenantAccount();
            // } catch (\Throwable $th) {
            //     return view('errors.DB');
            // }
            return $saved;
        } elseif (route('existAdmin') == request()->getUri()) {
            $validator = Validator::make(request()->all(), [
                'nom' => ['required'],
                'prenom' => ['required'],
                'email' => ['email', 'required'],
                'password' => ['required', 'confirmed', 'min:8'],
                'password_confirmation' => ['required']
            ]);
            if ($validator->fails())
                return json_encode($validator->errors());

            // try {
                $saved = $this->createAdminAccount();
            // } catch (\Throwable $th) {
            //     return view('errors.DB');
            // }
            return json_encode([
                'msg' => $saved,
                'link' => route('login_form')
            ]);
        }
    }

    public function createApprenantAccount()
    {
        $users = User::where('email', request('email'))->where("role", 'apprenant')->where("statut_id", '2')->get()->toArray();
        $usersInStanding = User::where('email', request('email'))->where("role", 'apprenant')->where("statut_id", '1')->get()->toArray();
        if (count($users) >= 1 || count($usersInStanding) >= 1)
            die(json_encode('alreadyInDB'));
        else {
            $token = bin2hex(openssl_random_pseudo_bytes(70));
            User::create([
                'nom' => request('nom'),
                'prenom' => request('prenom'),
                'email' => strtolower(request('email')),
                'password' => bcrypt(request('password')),
                'formasuiv_id' => request('formasuiv'),
                'statut_id' => 1,
                'avatars' => 'avatars/default.png',
                'validation_token' => $token,
            ]);

            Mail::to(request('email'))->send(new Account_Confirm($token, request('prenom')));
            return json_encode('saved');
        }
    }
    public function createAdminAccount()
    {
        $users = User::where('email', request('email'))->where('role', 'admin')->get()->toArray();
        if (count($users) >= 1)
            die(json_encode('alreadyInDB'));
        else {
            $token = bin2hex(openssl_random_pseudo_bytes(70));
            User::create([
                'nom' => request('nom'),
                'prenom' => request('prenom'),
                'email' => strtolower(request('email')),
                'password' => bcrypt(request('password')),
                'statut_id' => 1,
                'validation_token' => $token,
                'role' => 'admin'
            ]);

            Mail::to(request('email'))->send(new Account_Confirm($token, request('prenom')));
            return 'saved';
        }
    }


    public function modify_info()
    {
        if (auth()->user()->role == "admin") 
            $user = User::where('email', auth()->user()->email)->where("role", "admin")->first();
        else
            $user = User::where('email', auth()->user()->email)->where("role", "apprenant")->first();



        $user->nom = request('nom');
        $user->prenom = request('prenom');
        $user->email = strtolower(request('email'));
        $user->formasuiv_id = request('formasuiv');
        if (!empty(request("password"))) {
            $user->password = bcrypt(request('password'));
        }
        if (!empty(request()->file('avatar'))) {
            $user->avatars = request()->file('avatar')->store('avatars', 'public');
        }
        $user->save();

        return json_encode([
            "text" => 'modified',
            "link" => route(auth()->user()->role . '_profile')
        ]);
    }
}
