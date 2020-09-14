@extends('Frontend.app')
@section('title')
    Notice
@endsection

@section('bg-img',asset('Frontend/img/home-bg.jpg'))
@section('title','Warm Welcome')
@section('subtitle','The Best Place for News in the Best Place on Earth')

@section('main-content')
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
            @foreach ($notice as $notices)
            <div class="post-preview">
                <h2 class="post-title">
                {{$notices->title}}
                </h2>
                <p class="card-text">
                            <h6 class="post-subtitle">
                            Notice Date:{{$notices->notice_date}}
                            </h6>
                        </p>
                
                <p class="post-subtitle">
                {{$notices->content}}
                </p>                
                <p class="post-meta">Posted by
                    <a href="#">{{$notices->userType->name}}</a>
                    on {{$notices->created_at->diffForHumans()}} <a href="{{$notices->file}}"download>Download</a></p>                      
            </div>
            <hr>
            @endforeach

            <!-- Pager -->
            <div class="d-flex justify-content-center">
                {{$notice->links()}}
            </div>
        </div>
    </div>
  </div>
  <hr>
@endsection
