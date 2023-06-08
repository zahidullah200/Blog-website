<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table='categories';

    protected $fillable=[
        'name',
        'slug',
        'description',
        'image',
        'meta_title',
        'meta_description',
        'meta_keyword',
        'navbar_status',
        'status',
        'created_by'

    ];




    //If we want to delete one category and not delete the posts related to that category 
    //than we sill face some of the problems
    //because the category has one to many relationship with the post model
//Here  I am making one function for the ralationship between category and post

public function posts(){
    return $this->hasMany(Post::class,'category_id','id');
}
}
