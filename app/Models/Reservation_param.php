<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation_param extends Model
{
    use HasFactory;

    protected $fillable=[
        'time_start',
        'time_end',
        'places',
        'day',
        'date',
        'statut_id',
    ];

    public function reservation_apprenant(){
        return $this->hasMany('App\Models\Reservation_apprenant');
    }
    public function statut()
    {
        return $this->belongsTo('App\Models\Statut');
    }
    public function day()
    {
        return $this->belongsTo('App\Models\Day');
    }
}
