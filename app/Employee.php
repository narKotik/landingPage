<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //
    //protected $table = 'employees'; //if not match

    protected $fillable = [
        'name',
        'position',
        'images',
        'text',
    ];
}
