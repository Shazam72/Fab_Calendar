<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation_apprenant extends Model
{
    use HasFactory;

    public function statut(){
        return $this->belongsTo('App\Models\Statut');
    }
    public function reservation_param(){
        return $this->belongsTo('App\Models\Reservation_param');
    }
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
