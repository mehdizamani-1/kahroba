<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{

    protected $table = 'configs' ;

    protected $fillable = [
        'key' , 'value' , 'category'
    ];

    protected $hidden = [
        'created_at' , 'updated_at'
    ];

}
