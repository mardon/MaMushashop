<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id', 'status'];

    /**
     * Get the items for the order.
     */
    public function items()
    {
        return $this->belongsToMany('App\Product','order_product')->withPivot('quantity','price');
    }

    /**
     * Get the customer for order
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function customer()
    {
        return $this->hasOne('App\Customer','id','user_id');
    }
}
