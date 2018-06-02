<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductProvider extends Model
{
    protected $fillable = [
          'product_id', 'provider_id'
    ];
    public function product()
    {
        return $this->belongsTo('App\Product');
    }
    public function provider()
    {
        return $this->belongsTo('App\Provider');
    }


}
