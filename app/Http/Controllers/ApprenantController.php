<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApprenantController extends UsersController
{
    public function home(){
        $info_reservation=[
            'info_reservation'=>1
        ];
        return view('apprenant.home')->with($info_reservation);
    }
}
