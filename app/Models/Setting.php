<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\softDeletes;

class Setting extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable ;

    protected $table='settings';
    
    public $translatedAttributes = ['title', 'content', 'address']; // colums that will translation in category_translations table
    protected $fillable = ['id', 'logo', 'favicon', 'facebook', 'instagram', 'phone', 'email', 'created_at', 'updated_at', 'deleted_at'];
    public $timestamps = false;

    public static function checkSettings(){
        $settings = self::all();
        if(count($settings)<1){
            $data = [
              
               'id'=>1,
    
            ];
    
            foreach (config('app.languages') as $key => $value) {
                $data[$key]['title'] = $value;
            }
    
            self::create($data);
    
    
        }
    
        return self::first();
       }

}
