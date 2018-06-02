<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'paid','client_id', 'employee_id'

    ];

    public function productSales()
    {
        return $this->hasMany('App\ProductSale');
    }

   /* public function products()
    {
        return $this->belongsToMany('App\Product')->withPivot('quantity');
    }*/

    public function client()
    {
        return $this->belongsTo('App\Client');
    }

    public function employee()
    {
        return $this->belongsTo('App\Employee');
    }

    public function scopeName($query, $name){

        if(trim($name)!= ""){
            $query->where('id', $name);
        }

    }


}
