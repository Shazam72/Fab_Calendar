<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statut extends Model
{
    use HasFactory;

    public function reservation_apprenant(){
        return $this->hasMany('App\Models\Reservation_apprenant');
    }
    public function user(){
        return $this->hasMany('App\Models\User');
    }
    public function reservation_param(){
        return $this->hasMany('App\Models\Reservation_param');
    }
}
