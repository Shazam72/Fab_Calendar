<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    use HasFactory;

    public function reservation_param(){
        return $this->hasMany('App\Models\Reservation_param');
    }
}
