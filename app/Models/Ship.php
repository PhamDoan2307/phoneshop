<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ship extends Model
{
    //
    protected $table='ships';
    protected $fillable=['name'];
    public function orders(){
        return $this->belongsTo('App\Order');
    }
}
