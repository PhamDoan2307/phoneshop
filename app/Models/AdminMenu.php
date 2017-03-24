<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminMenu extends Model
{
    //
    protected $table = 'admin_menus';
    protected $fillable = ['alias','admin_id','name', 'link', 'publish', 'orders', 'parent_id'];
}
