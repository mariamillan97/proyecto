<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = ['dale', 'client_id', 'employee_id'];

    public function productSale()
    {
        return $this->hasOne('App\ProductSale');
    }

    public function client()
    {
        return $this->belongsTo('App\Client');
    }

    public function employee()
    {
        return $this->belongsTo('App\Employee');
    }
}
