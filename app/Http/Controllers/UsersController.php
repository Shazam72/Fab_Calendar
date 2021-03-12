<?php

namespace App\Http\Controllers;

use App\Models\Formasuiv;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    public static function getFormations_login(){
            $formations=Formasuiv::all();
        return view('login',[
            'formations'=>$formations
        ]);
    }

    public function verify_form(){
       if(count(request()->all())==4){
            $validator=Validator::make(request()->all(),[
                'email'=>['email','required'],
                'password'=>['required','confirmed','min:8'],
                'password_confirmation'=>['required']
            ]);
       } elseif(count(request()->all())==7){
            $validator=Validator::make(request()->all(),[
                'nom'=>['required'],
                'prenom'=>['required'],
                'email'=>['email','required'],
                'formasuiv'=>['required'],
                'password'=>['required','confirmed','min:8'],
                'password_confirmation'=>['required']
            ]);
        }
        if($validator->fails())
            return $validator->errors();
        
        $users=User::create([
            'nom'=>request('nom'),
            'prenom'=>request('prenom'),
            'email'=>request('email'),
            'password'=>request('password'),
            'formasuiv'=>request('formasuiv')
        ]);
    }
}
