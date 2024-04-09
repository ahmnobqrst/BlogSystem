<?php


namespace App\Traits;

trait imagesettingtrait {


  public function SaveImagelogo($logoimage,$logopathimage){
     
      
    $file_extension = $logoimage->getClientOriginalExtension();
    $file_name = time().'.'. $file_extension;
    
    $path = $logopathimage.$file_name;
    $logoimage->move(public_path($logopathimage),$file_name);
    
    return $path;


}

public function SaveImagefavicon($faviconimage,$faviconpathimage){
     
      
  $file_extension = $faviconimage->getClientOriginalExtension();
  $file_name = time().'.'. $file_extension;
  
  $path = $faviconpathimage.$file_name;
  $faviconimage->move(public_path($faviconpathimage),$file_name);
  
  return $path;


}





}