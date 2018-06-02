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

     public function productSales()
     {
         return $this->hasMany('App\ProductSale');
     }

 /*   public function sales()
    {
        return $this->belongsToMany('App\Sale')->withPivot('quantity');
    }*/

   /* public function providers()
    {
        return $this->belongsToMany('App\Provider')->withPivot('name');

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