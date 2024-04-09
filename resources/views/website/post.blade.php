@extends('website.layout.layout')
@section('meta_description')
  {{strip_tags($Post->content)}}
@endsection
@section('meta_keywords')
  الكلمات الدلالية
@endsection
@section('title')
{{$Post->title}}-- {{$settings->title}}
@endsection

@section('body')

<div class="container-fluid py-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="owl-carousel owl-carousel-2 carousel-item-1 position-relative mb-3 mb-lg-0">
                      
                        <div class="position-relative overflow-hidden" style="height: 435px;">
                            <img class="img-fluid h-100" src="{{asset($Post->image)}}" style="object-fit: cover;">
                            <div class="overlay">
                                <div class="mb-1">
                                    <a class="text-white" href="">{{$Post->category->title}}</a>
                                    <span class="px-2 text-white">/</span>
                                    <span>{{$Post->created_at}}</span>
                                </div>
                                <div>
                                    <h3 class="mb-3">{{$Post->title}}</h3>
                                    <p>{!! $Post->smalldesc!!}</p>
                                    <p>{!! $Post->content!!}</p>
                                </div>
                            </div>
                        </div>
                      
                    </div>
                </div>
               
            </div>
        </div>
    </div>
 @stop