@extends('dashboard.layouts.layout')

@section('content')

<ol class="breadcrumb">
            <li class="breadcrumb-item">{{trans('words.Dashboard')}}</li>
            <li class="breadcrumb-item"><a href="#">{{trans('words.user')}}</a>
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

   <div class="animated fadeIn">

       <form action="{{route('dashboard.users.store')}}" method="Post">
         
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
                    <strong>{{__('words.users')}}</strong>
                </div>
                <div class="card-block">
                    <div class="form-group col-md-12">
                       <label ><h4>{{trans('words.username')}}</h4></label>
                       <input type="text" class="form-control" name="name" id="name" placeholder="{{trans('words.username')}}" >
                    </div>
                    <div class="form-group col-md-12">
                       <label ><h4>{{trans('words.email')}}</h4></label>
                       <input type="email" class="form-control"  name="email" id="email" placeholder="{{trans('words.email')}}" >
                    </div>
                    <div class="form-group col-md-12">
                       <label ><h4>{{trans('words.password')}}</h4></label>
                       <input type="password" class="form-control" name="password" id="password" placeholder="{{trans('words.password')}}" >
                    </div>
                    <div class="form-group col-md-12">
                            <label><h4>{{ __('words.Confirm Password') }}</h4></label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" >
                    </div>
                    <div class="form-group col-md-12">
                       <label ><h4>{{trans('words.status')}}</h4></label>
                       <select name="status" id="" class="form-control">
                          <option value="" >not active</option>
                          <option value="admin" >admin</option>
                          <option value="writer">writer</option>
                       </select>
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