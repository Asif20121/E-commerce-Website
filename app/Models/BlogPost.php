<?php

namespace App\Models;

use App\Models\Blog\BlogPostCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BlogPost extends Model
{
    use HasFactory;

    protected $guarded = [];



    public function category(){
    	return $this->belongsTo(BlogPostCategory::class,'category_id','id');
    }


}
