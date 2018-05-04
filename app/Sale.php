<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'paid','client_id', 'employee_id'

    ];

     public function productSale()
    {
        return $this->hasMany('App\ProductSale'); //->withPivot('quantity');

    }

   /* public function product()
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
}
