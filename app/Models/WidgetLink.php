<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WidgetLink extends Model
{
    protected $table = 'widget_links' ;

    protected $fillable = [
        'active' , 'removable' , 'title' , 'link_url' , 'icon' , 'font_color' , 'background_color'
    ] ;

    protected $hidden = [
        'created_at' , 'updated_at'
    ] ;
}
