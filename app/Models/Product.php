<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'products';
    protected $fillable = ['name', 'alias', 'price', 'content', 'group_id', 'admin_id', 'hot', 'view', 'status', 'image'];

    public function group()
    {
        return $this->belongsTo('App\Models\GroupProduct');
    }

    public function order_detail()
    {
        return $this->belongsTo('App\Models\OrderDetail');
    }

    public function images()
    {
        return $this->hasMany('App\Models\ProductImage','product_id','id');
    }

    public function company()
    {
        return $this->belongsTo('App\Models\Company');
    }

    public function colors()
    {
        return $this->belongsToMany('App\Models\Color','color_products','product_id','color_id');
    }
}
