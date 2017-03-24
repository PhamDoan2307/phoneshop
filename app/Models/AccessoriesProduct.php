<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccessoriesProduct extends Model
{
    //
    protected $table='accessories_products';
    protected $fillable=['name','title','price','status','create_at','updated_at'];
}
