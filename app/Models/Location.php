<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    protected $fillable = [
        'language_id',
        'street_view',
        'virtual_tour',
        'active',
        'active',
        'title',
        'lat',
        'lng',
        'abstract',
        'description',
        'main_pic',
    ];
}
