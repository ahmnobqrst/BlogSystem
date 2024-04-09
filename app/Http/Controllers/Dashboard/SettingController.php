<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\settingRequest;
use App\Traits\imagesettingtrait;

class SettingController extends Controller
{

  public function __construct(Setting $settings){
    $this->setting = $settings;
}
     use imagesettingtrait;

     public function index(){

      $this->authorize('update',$this->setting);
  
      $setting = Setting::all();
      
      return view('dashboard.settings');
     }

    public function update(settingRequest $result , Setting $setting){
      $this->authorize('update',$this->setting );

      $setting->update($result->except('logo','favicon','_token'));
      
      if($result->has('logo'))
      {
        $imagelogoname = $this->SaveImagelogo($result->logo,'images/logo/');
        $setting->update(['logo'=>$imagelogoname]);
      }

     
    
      if($result->has('favicon'))
      {
          $imagefaviconname = $this->SaveImagefavicon($result->favicon,'images/favicon/');
          $setting->update(['favicon'=>$imagefaviconname]);
      }
    
       
       return redirect()->route('dashboard.settings');
       
       
          
       
        
    }
}
