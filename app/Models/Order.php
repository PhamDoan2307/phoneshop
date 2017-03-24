<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $table='orders';
    protected $fillable=['total','status'];
    public function customer(){
        return $this->belongsTo('App\Customer');
    }
    public function orderdetail(){
        return $this->hasOne('App\OrderDetail');
    }
    public function ship(){
        return $this->hasOne('App\Ship');
    }
}
