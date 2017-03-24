<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //
    protected $table='contacts';
    protected $fillable=['title','your_name','email','comment'];
}
