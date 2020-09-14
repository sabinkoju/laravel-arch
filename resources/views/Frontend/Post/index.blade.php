@extends('Frontend.app')
@section('title')
    Post
@endsection

@section('bg-img',asset('Frontend/img/home-bg.jpg'))
@section('title','Warm Welcome')
@section('subtitle','The Best Place for News in the Best Place on Earth')

@section('main-content')
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
            @foreach ($post as $posts)
            <div class="post-preview">
                <img src="{{asset('uploads/Post/'.$posts->banner_image)}}"alt="Post image">
                <br>
                <h2 class="post-title">
                {{$posts->title}}
                </h2>
                <p class="post-meta">Posted by
                    <a href="#">{{$posts->userType->name}}</a>
                    on {{$posts->created_at->diffForHumans()}}</p>
                <p class="post-subtitle">
                {{$posts->content}}
                </p>
            </div>
            <hr>
            @endforeach

            <!-- Pager -->
            <div class="d-flex justify-content-center">
                {{$post->links()}}
            </div>
        </div>
    </div>
  </div>
  <hr>
@endsection
