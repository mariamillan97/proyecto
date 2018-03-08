<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductSale extends Model
{
    protected $fillable = ['quantity', 'product_id', 'sale_id'];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    public function sale()
    {
        return $this->belongsTo('App\Sale');
    }
}
