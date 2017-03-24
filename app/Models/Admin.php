<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    //
    protected $table='admins';
    protected $fillable=['username','name','address','birthday','tel','permission_id'];
    protected $hidden = [
        'password', 'remember_token',
    ];
}
