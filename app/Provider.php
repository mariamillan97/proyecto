<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    protected $fillable = [
        'name', 'email','address','number', 'product_id'
    ];

    /*public function products()
    {
        return $this->belongsToMany('App\Product')->withPivot('name');
    }*/

    public function productProvider()
    {
        return $this->hasMany('App\ProductProvider');
    }

    public function scopeName($query, $name){

        if(trim($name)!= ""){
            $query->where('name', $name);
        }

    }
}
