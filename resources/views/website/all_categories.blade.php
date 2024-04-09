@extends('website.layout.layout')

@section('body')



    <!-- Category News Slider Start -->
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                @foreach($categories_with_posts as $category)
                @if(count($category->posts) > 0)
                <div class="col-lg-6 py-3">
                    <div class="bg-light py-2 px-4 mb-3">
                        <h3 class="m-0">{{$category->title}}</h3>
                    </div>
                    <div class="owl-carousel owl-carousel-3 carousel-item-2 position-relative">
                        @foreach($category->posts as $post)
                        <div class="position-relative">
                            <img class="img-fluid w-100" src="{{asset($post->image)}}" style="object-fit: cover;">
                            <div class="overlay position-relative bg-light">
                                <div class="mb-2" style="font-size: 13px;">
                                    <a href="{{route('category',$category->id)}}">{{$category->title}}</a>
                                    <span class="px-1">/</span>
                                    <span>{{$post->created_at}}</span>
                                </div>
                                <a class="h4 m-0" href="{{route('post',$post->id)}}">{{$post->title}}</a>
                            </div>
                        
                        </div>
                        @endforeach
                        
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </div>
  

    

@endsection