@extends('website.layout.layout')
@section('meta_description')
  {{$category->content}}
@endsection
@section('meta_keywords')
  الكلمات الدلالية
@endsection
@section('title')
{{$category->title}}-- {{$settings->title}}
@endsection

@section('body')


<div class="container-fluid">
    <div class="container">
        <nav class="breadcrumb bg-transparent m-0 p-0">
          <a class="breadcrumb-item" href="{{route('index')}}">{{__('words.home')}}</a>
          <a class="breadcrumb-item" href="{{route('all.categories')}}">{{__('words.categories')}}</a>
          <a class="breadcrumb-item" href="{{route('category',$category->id)}}">{{$category->title}}</a>
        </nav>

    </div> 
</div>
<div class="container-fluid py-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row mb-3">
                        <div class="col-12">
                            <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                                <h3 class="m-0">{{$category->title}}</h3>
                                <a class="text-secondary font-weight-medium text-decoration-none" href="{{route('all.categories')}}">{{__('words.View All')}}</a>
                            </div>
                        </div>
                        @foreach($category->childern as $category)
                        <div class="col-lg-4">
                            <div class="position-relative mb-3">
                                <img class="img-fluid w-100" src="{{asset($category->image)}}" style="object-fit: cover;">
                                <div class="overlay position-relative bg-light">
                                    <div class="mb-2" style="font-size: 14px;">
                                        <a href="">{{$category->title}}</a>
                                    </div>
                                    <a class="h4" href="">{{$category->title}}</a>
                                    <p class="m-0"></p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                            
                        
                       
                    </div>
                    
                    <div class="row">
                      @foreach($posts as $post)
                        <div class="col-lg-6">
                            <div class="d-flex mb-3">
                                <img src="{{asset($post->image)}}" style="width: 100px; height: 100px; object-fit: cover;">
                                <div class="w-100 d-flex flex-column justify-content-center bg-light px-3" style="height: 100px;">
                                    <div class="mb-1" style="font-size: 13px;">
                                        <a href="">{{$category->title}}</a>
                                        <span class="px-1">/</span>
                                        <span>{{$post->created_at}}</span>
                                    </div>
                                    <a class="h6 m-0" href="{{route('post',$post->id)}}">{{$post->title}}</a>
                                </div>
                            </div>
                        </div>
                      @endforeach
                    </div>

                    <div class="row">
                        <div class="col-12 text-center">
                            <nav aria-label="page navigation">
                              {{$posts->links()}}
                            </nav>
                        </div>




                    </div>
                        
                    <!-- Popular News End -->

                    <!-- Tags Start -->
                   
                    <!-- Tags End -->
                </div>
            </div>
        </div>
    </div>

@endsection