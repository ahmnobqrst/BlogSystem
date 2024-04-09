@extends('dashboard.layouts.layout')

@section('content')


<ol class="breadcrumb">
            <li class="breadcrumb-item">{{trans('words.Dashboard')}}</li>
            <li class="breadcrumb-item"><a href="#">{{trans('words.category')}}</a>
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

<div class="container fluid">
@if (session('success'))
<div class="container">
    <div class="alert alert-danger alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <p>{{{ session('success') }}}</p>
    </div>
</div>
@endif

   <div class="animated fadeIn">

       <form action="{{route('dashboard.category.store')}}" method="Post" enctype="multipart/form-data">
         
          @csrf
          @method('Post')
          <div class="row">
           
             @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                           <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
             @endif

             <div class="card">
                <div class="card-header">
                    <strong>{{__('words.categories')}}</strong>
                </div>
                <div class="card-block">
                    <div class="form-group col-md-12">
                       <label ><h4>{{trans('words.category image')}}</h4></label>
                       <input type="file" class="form-control" name="image" id="image" >
                    </div>
                    <div class="form-group col-md-12">
                       <label ><h4>{{trans('words.status')}}</h4></label>
                       <select name="parent" id="parent" class="form-control">
                          <option value="0" >قسم رنيسي</option>
                          @foreach($categories as $category){
                           <option value="{{$category->id}}" >{{$category->title}} </option>
                          }
                          @endforeach
                       </select>
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
                       <input type="text" name="{{$key}}[title]" class="form-control" placeholder="{{trans('words.title')}}">
                       @error('{{$key}}[title]')
                       <span class="alert alert-danger alert-dismissible">{{ $message }}</span>
                       @enderror 
                    </div>
                    <div class="list-group">
                       <label class="form-label">{{__('words.content')}} -{{$lang}}</label>
                       <textarea type="text" name="{{$key}}[content]" class="form-control" placeholder="{{__('words.content')}}"></textarea>
                       @error('{{$key}}[content]')
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
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-dot-circle-o"></i>{{__('words.submit')}}</button>
                </div>
             
             
             <div>

          </div>






       </form>

   </div>


</div>
@endsection