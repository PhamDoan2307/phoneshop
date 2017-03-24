<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroupProduct extends Model
{
    //
    protected $table='group_products';
    protected $fillable=['name','describe','status','image','admin_id','company_id'];
    public function product(){
        return $this->hasMany('App\Models\Product');
    }
    public function company(){
        return $this->belongsTo('App\Models\Company');
    }
}
