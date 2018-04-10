<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    protected $fillable = [
        'name', 'email','address','number', 'product_id'
    ];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
