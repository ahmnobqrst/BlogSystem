<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use App\Models\Category;
use \Staudenmeir\EloquentEagerLimit\HasEagerLimit;
use App\Models\User;
use Illuminate\Database\Eloquent\softDeletes;

class Post extends Model implements TranslatableContract
{

    use HasFactory;
    use Translatable , softDeletes , HasEagerLimit;

//    protected $dates = [
//         'created_at',
//         'updated_at',
//         'deleted_at'
//     ];

    protected $table='posts';
    
    public $translatedAttributes = ['title', 'content','smalldesc','tags']; // colums that will translation in category_translations table
    protected $fillable = ['id', 'image', 'category_id', 'created_at', 'updated_at', 'deleted_at','user_id'];
    public $timestamps = true;

    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
