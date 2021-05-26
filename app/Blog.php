<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = ['title','post','post_excerpt','slug','user_id','featuredImage','metaDescription','views','jsonData'];



    public function setTitleAttribute($title){
        $this->attributes['title'] = $title;
        $this->attributes['slug'] = $this->uniqueSlug($title);
    }

    private function uniqueSlug($title){
        $slug = Str::slug($title,'-');
        $count = Blog::where('slug','LIKE',"{$slug}%")->count();
        $newCount = $count > 0 ? ++$count : '';
        return $newCount > 0 ? "$slug-$count" : $slug;

    }

    public function categories(){
        return $this->belongsToMany('App\Category', 'blog_categories'); //blog_categories is the pivot table from Database then foreign key is required.
    }
    
    public function tags(){
        return $this->belongsToMany('App\Tag', 'blog_tags'); //blog_tags is the pivot table from Database then foreign key is required.
    }

    public function user(){
        return $this->belongsTo('App\User')->select('id','fullName','profilePic');
    }
}
