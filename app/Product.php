<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Product extends Model

{
     protected $fillable = [
         'name','stock','pricePurchase','priceSale',
         'dateOfExpiry', 'prescription', 'quantity',
         'sale_id', 'provider_id'
     ];

     public function sale()
     {
         return $this->belongsToMany('App\Sale')->withPivot('quantity');
     }

    public function provider()
    {
        return $this->belongsToMany('App\Provider');

    }

}