<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    //
    protected $table='colors';
    protected $fillable=['id','color','price','status','admin_id'];
    public function product(){
        return $this->belongsToMany('App\Models\Product','color_products');
    }
}
