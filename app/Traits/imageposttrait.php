<?php


namespace App\Traits;

trait imageposttrait {


  public function SaveImagepost($postimage,$postpathimage){
     
      
    $file_extension = $postimage->getClientOriginalExtension();
    $file_name = time().'.'. $file_extension;
    
    $path = $postpathimage.$file_name;
    $postimage->move(public_path($postpathimage),$file_name);
    
    return $path;


}





}