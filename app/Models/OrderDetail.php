<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    //
    protected $table='order_details';
    protected $fillable=['quantity','total'];
    public function order(){
        return $this->belongsTo('App\Order');
    }
    public function product(){
        return $this->hasMany('App\Product');
    }
}
