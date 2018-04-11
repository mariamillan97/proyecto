<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'paid','client_id', 'employee_id','quantity','product_id'

    ];

    public function product()
    {
        return $this->belongsToMany('App\Product')->withPivot('quantity');

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
