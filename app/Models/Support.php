<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    //
    protected $table='supports';
    protected $fillable=['name','tel','type','order','status'];
}
