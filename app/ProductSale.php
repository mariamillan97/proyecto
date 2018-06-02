<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductSale extends Model
{
    protected $fillable = [
        'quantity', 'sale_id', 'product_id'
    ];
    public function sale()
    {
        return $this->belongsTo('App\Sale', 'sale_id', 'id');
    }
    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    public function scopeName($query, $name){

        if(trim($name)!= ""){
            $query->where('sale_id', $name);
        }

    }


}
