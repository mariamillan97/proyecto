<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [ 'name'];

    public function employee(){

        return $this->hasMany('App\Employee');
    }
}
