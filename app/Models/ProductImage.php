<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    //
    protected $table='product_images';
    protected $fillable=['name','product_id','admin_id'];
    public function product(){
        return $this->belongsTo('App\Models\Product');
    }
}
