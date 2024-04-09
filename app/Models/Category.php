<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use \Staudenmeir\EloquentEagerLimit\HasEagerLimit;
use App\Models\Post;
use Illuminate\Database\Eloquent\softDeletes;


class Category extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable ,softDeletes ,  HasEagerLimit;

    protected $table='categories';
    
    public $translatedAttributes = ['title', 'content']; // colums that will translation in category_translations table
    protected $fillable = ['id', 'image', 'parent', 'created_at', 'updated_at', 'deleted_at'];
    public $timestamps = false;


    public function Parents(){
      return  $this->belongsTo(Category::class,'parent');
    }
    public function childern(){
       return  $this->hasMany(Category::class,'parent');
    }

    public function posts(){
      return  $this->hasMany(Post::class);
   }
}


