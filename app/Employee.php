<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [ 'salary','role_id'];


    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function sale()
    {
        return $this->hasMany('App\Sale');
    }

    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public function getFullNameAttribute()
    {
        return $this->user->name .' '.$this->user->lastName1;
    }

    public function scopeName($query, $name){

        if(trim($name)!= ""){
            $query->where('salary', $name);
        }

    }


}
