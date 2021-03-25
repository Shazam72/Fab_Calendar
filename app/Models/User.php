<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable as AuthAuthenticatable;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements Authenticatable
{
    use AuthAuthenticatable;
    use HasFactory;
    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'password',
        'formasuiv_id',
        'statut_id',
        'validation_token',
        'role'
    ];

    public function statut()
    {
        return $this->belongsTo('App\Models\Statut');
    }
    public function formasuiv()
    {
        return $this->belongsTo('App\Models\Formasuiv');
    }
    public function reservation_apprenant()
    {
        return $this->hasMany('App\Models\Reservation_apprenant');
    }

    public function getEmail(){
        return $this->attributes['email'];
    }
    public function setEmail($value){
        $this->attributes['email']=$value;
        $this->save();
    }
    public function setToken($value=""){
        $this->attributes['validation_token']=$value;
        $this->save();
    }
    public function setStatut($value){
        $this->attributes['statut_id']=$value;
        $this->save();
    }
    public function setFormation($value){
        $this->attributes['formasuiv_id']=$value;
        $this->save();
    }
    public function setAvatar($value){
        $this->attributes['avatars']=$value;
        $this->save();
    }




    public function getRememberTokenName()
    {
        return null;
    }
}
