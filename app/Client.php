<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [ 'socSecNum','debt','purchasedProducts'];


    public function sale()
    {
        return $this->hasMany('App\Sale');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function getFullNameAttribute()
    {
        return $this->user->name .' '.$this->user->lastName1;
    }

    public function scopeName($query, $name){

        if(trim($name)!= ""){
            $query->where('socSecNum', $name);
        }

    }


}
