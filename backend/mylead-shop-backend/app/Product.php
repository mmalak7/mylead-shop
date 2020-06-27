<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // protected $table = 'some_name' in this way we are connecting the model for specific table name but the name of class automatically connect as for specific table!!
    protected $fillable = ['type', 'name', 'description'];
}
