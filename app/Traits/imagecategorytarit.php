<?php


namespace App\Traits;

trait imagecategorytarit {


    public function SaveImagecategory($image,$pathimage){
     
      
             $file_extension = $image->getClientOriginalExtension();
             $file_name = time().'.'. $file_extension;
             
             $path = $pathimage.$file_name;
             $image->move(public_path($pathimage),$file_name);
             
             return $path;
    

     }





}