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

       <form action="{{route('dashboard.users.update',$user)}}" method="Post">
         
          @csrf
          @method('put')
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
                       <label >{{trans('words.username')}}</label>
                       <input type="text" class="form-control" name="name" id="name" value="{{$user->name}}" >
                    </div>
                    <div class="form-group col-md-12">
                       <label >{{trans('words.email')}}</label>
                       <input type="email" class="form-control"  name="email" id="email" value="{{$user->email}}" >
                    </div>
                    @can('viewAny',$user)
                    <div class="form-group col-md-12">
                       <label >{{trans('words.status')}}</label>
                       <select name="status" id="" class="form-control">
                          <option value="" @if ($user->status) selected @endif>{{__('words.not active')}}</option>
                          <option value="admin" @if($user->status == 'admin') selected @endif>{{__('words.admin')}}</option>
                          <option value="writer" @if($user->status == 'writer') selected @endif>{{__('words.writer')}}</option>
                       </select>
                    </div>
                    @endcan
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-dot-circle-o"></i>submit</button>
                    <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i>Reset</button>
                </div>
             
             
             <div>

          </div>






       </form>

   </div>


</div>
@endsection