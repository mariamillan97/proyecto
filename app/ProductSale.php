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
        return $this->belongsTo('App\Sale');
    }
    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
