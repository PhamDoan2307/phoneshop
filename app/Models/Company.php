<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //
    protected $table='companies';
    protected $fillable=['name','alias','address','tel','fax','status','admin_id'];
    public function group_product(){
        return $this->hasMany('App\Models\GroupProduct');
    }
    public function products(){
        return $this->hasManyThrough('App\Models\Product','App\Models\GroupProduct','company_id','group_id','id');
    }
}
