<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Product extends Model

{
     protected $fillable = ['code','name','numberOfStocks'];

     public function productSale()
     {
         return $this->hasMany('App\ProductSale');
     }

    public function provider()
    {
        return $this->belongsToMany('App\Provider');

    }

}