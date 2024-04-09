
@extends('dashboard.layouts.layout')

@section('content')

<ol class="breadcrumb">
            <li class="breadcrumb-item">{{trans('words.Dashboard')}}</li>
            <li class="breadcrumb-item"><a href="#">{{trans('words.setting')}}</a>
            </li>
            <li class="breadcrumb-item active">{{trans('words.Dashboard')}}</li>

            <!-- Breadcrumb Menu-->
            <!-- <li class="breadcrumb-menu">
                <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                    <a class="btn btn-secondary" href="#"><i class="icon-speech"></i></a>
                    <a class="btn btn-secondary" href="./"><i class="icon-graph"></i> &nbsp;{{trans('words.Dashboard')}}</a>
                    <a class="btn btn-secondary" href="#"><i class="icon-settings"></i> &nbsp;{{trans('words.Dashboard')}}</a>
                </div>
            </li> -->
</ol>

@if($errors->any())
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>
            {!! implode('<br/>', $errors->all('<span>:message</span>')) !!}
        </strong>
    </div>
@endif

<div class="container"> 
 
    

  <form action ="{{Route('dashboard.setting.update', ['setting'=>$settings])}}" method="POST" enctype="multipart/form-data"> 
      <div class="text-center padding"><h2> {{trans('words.settings')}}</h2></div>  
        <div class="form-group row">
                 
          <div class="form-row "> 
            @csrf
              <div class="form-group col-md-6">  
                   <label class="form-label col-lg-12">{{__('words.logo')}}</label>  
                   <img src="{{asset($settings->logo)}}" alt="" style="width: 50px; height: 50px;" />
               </div>
               
               <div class="form-group col-md-6">  
                   <label class="form-label col-lg-12">{{__('words.favicon')}}</label>  
                   <img src="{{asset($settings->favicon)}}" alt="" style="width: 50px; height: 50px;"/> 
               </div> 
               <div class="form-group col-md-6">  
                   <label for="logo" class="form-label col-lg-12">{{__('words.logo')}}</label>  
                   <input name = "logo" type="file" class="form-control col-lg-12" >
                   @error('logo')
                   <span class="alert alert-danger alert-dismissible">{{ $message }}</span>
                   @enderror   
               </div>  
                <div class="form-group col-md-6">  
                   <label for="favicon" class="form-label col-lg-12">{{__('words.favicon')}}</label>  
                   <input name = "favicon"type="file" class="form-control col-lg-12" > 
                   @error('favicon')
                   <span class="alert alert-danger alert-dismissible">{{ $message }}</span>
                   @enderror  
                </div>   
               <div class="form-group col-md-6">  
                   <label for="facebook" class="form-label col-lg-12">{{__('words.facebook')}}</label>  
                   <input name = "facebook" type="text" class="form-control col-lg-12"  placeholder="{{__('words.facebook')}}" autocomplete value="{{$settings->facebook}}"> 
                   @error('facebook')
                   <span class="alert alert-danger alert-dismissible">{{ $message }}</span>
                   @enderror  
               </div>  
               <div class="form-group col-md-6">  
                   <label for="instgram" class="form-label col-lg-12">{{__('words.instagram')}}</label>  
                   <input name = "instagram" type="text" class="form-control col-lg-12"  placeholder="{{__('words.instagram')}}" autocomplete value="{{$settings->instagram}}"> 
                   @error('instagram')
                   <span class="alert alert-danger alert-dismissible">{{ $message }}</span>
                   @enderror 
               </div> 
               <div class="form-group col-md-6">  
                   <label for="phone" class="form-label col-lg-12">{{trans('words.phone')}}</label>  
                   <input name = "phone" type="text" class="form-control col-lg-12"  placeholder="{{trans('words.phone')}}"value="{{$settings->phone}}"> 
                   @error('phone')
                   <span class="alert alert-danger alert-dismissible">{{ $message }}</span>
                   @enderror  
               </div> 
               
               <div class="form-group col-md-6">  
                   <label for="email" class="form-label col-lg-12">{{trans('words.email')}}</label>  
                   <input name = "email" type="email" class="form-control col-lg-12"  placeholder="{{trans('words.email')}}"value="{{$settings->email}}"> 
                    @error('email')
                   <span class="alert alert-danger alert-dismissible">{{ $message }}</span>
                   @enderror 
               </div> 
          </div>   
       
 <div class="col-xs-12 col-sm-8 ">
    <section class="container py-4">
        
          <div class="row">
                  <div class="col-md-12">
                      <h2>{{trans('words.transaction')}}</h2>
                      <ul id="tabs" class="nav nav-tabs">

              @foreach(config('app.languages') as $key=>$lang)
                <li class="nav-item"><a href="#{{$key}}" data-target="#{{$key}}" data-toggle="tab" class="nav-link small text-uppercase">{{$lang}}</a></li>
              @endforeach
            </ul>
            <br>
            
            <div id="tabsContent" class="tab-content">
              @foreach(config('app.languages') as $key=>$lang)
                <div id="{{$key}}" class="tab-pane fade">
                    <div class="list-group">
                       <label class="form-label">{{trans('words.title')}} -{{$lang}}</label>
                       <input type="text" name="{{$key}}[title]" class="form-control" placeholder="{{trans('words.title')}}" value="{{$settings->translate($key)->title}}">
                       @error('{{$key}}[title]')
                       <span class="alert alert-danger alert-dismissible">{{ $message }}</span>
                       @enderror 
                    </div>
                    <div class="list-group">
                       <label class="form-label">{{__('words.content')}} -{{$lang}}</label>
                       <textarea type="text" name="{{$key}}[content]" class="form-control" placeholder="{{__('words.content')}}" value="{{$settings->translate($key)->content}}"></textarea>
                       @error('{{$key}}[content]')
                       <span class="alert alert-danger alert-dismissible">{{ $message }}</span>
                       @enderror 
                    </div>
                    <div class="list-group">
                       <label class="form-label">{{trans('words.address')}} -{{$lang}}</label>
                       <input type="text" name ="{{$key}}[address]" class="form-control" placeholder="{{trans('words.address')}}" value="{{$settings->translate($key)->address}}">
                       @error('{{$key}}[address]')
                       <span class="alert alert-danger alert-dismissible">{{ $message }}</span>
                       @enderror 
                    </div>
                </div>
              @endforeach
           </div>
           
        </div>
    </div>
      
 </section>

</div>
  
</div>
 
      <div class="form-group col-lg-4">  
            <button type="submit" class=" btn btn-primary padding-top">Submit</button>  
            <button type="reset" class=" btn btn-danger padding-top">Reset</button>  
      </div> 


      

  </form>
</div>   
          
 










@endsection







