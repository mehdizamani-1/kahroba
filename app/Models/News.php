<?php

namespace App\Models;

use App\Admin;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    /**
     * @var string
     */
    protected $table= 'news' ;


    /**
     * @var string[] \
     */
    protected $fillable = [
        'display' , 'news_category_id' , 'title' , 'author' , 'content'
    ];


    /**
     * @var string[]
     */
    protected $hidden = [
        'created_at','updated_at'
    ];


    public function category()
    {
//        return $this->hasOne(NewsCategory::class,'id','news_category_id') ;

        return NewsCategory::query()
            ->where('id',$this->news_category_id)
            ->first();
    }


    public function author()
    {
//        return $this->hasOne(Admin::class,'id','author');
        return Admin::query()
            ->select('first_name' , 'last_name')
            ->where('id',$this->author)
            ->first();
    }

}
