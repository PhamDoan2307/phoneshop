<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permisson extends Model
{
    //
    protected $table='permission';
    protected $fillable=['name','describe'];

}
