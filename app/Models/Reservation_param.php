<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation_param extends Model
{
    use HasFactory;

    public function reservation_apprenant(){
        return $this->hasMany('App\Models\Reservation_apprenant');
    }
}
