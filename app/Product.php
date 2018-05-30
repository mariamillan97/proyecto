<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Product extends Model

{
     protected $fillable = [
         'name','stock','pricePurchase','priceSale',
         'dateOfExpiry', 'prescription',
         'provider_id'
     ];

     public function productSale()
     {
         return $this->hasMany('App\productSale');
     }

 /*   public function sales()
    {
        return $this->belongsToMany('App\Sale')->withPivot('quantity');
    }*/

    public function provider()
    {
        return $this->belongsToMany('App\Provider');

    }

}