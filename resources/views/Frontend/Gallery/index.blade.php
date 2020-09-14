@extends('Frontend.app')
@section('bg-img',asset('Frontend/img/event.jpg'))
@section('title','Gallery')
@section('subtitle','Lets Start Our Journey')

@section('main-content')
    <div class="container">
        <!-- Grid row -->
        <div class="row">

            <!-- Grid column -->
            <div class="col-md-12 d-flex justify-content-center mb-5">
                <button type="button" class="btn btn-outline-black waves-effect filter" data-rel="all">All</button>
                @foreach ($gallery as $galleries)        
                    <button type="button" class="btn btn-outline-black waves-effect filter" data-rel="{{$galleries->galleryType->gallery_name}}">{{$galleries->galleryType->gallery_name}}</button>
                    {{-- <button type="button" class="btn btn-outline-black waves-effect filter" data-rel="2">Sea</button> --}}
                @endforeach   
            </div>
            <!-- Grid column -->

        </div>
        <!-- Grid row -->

        <!-- Grid row -->
        <div class="gallery" id="gallery">
            @foreach ($gallery as $galleries)
                <!-- Grid column -->
            <div class="mb-3 pics animation all {{$galleries->galleryType->gallery_name}}">
            <img class="img-fluid" src="/uploads/Gallery/{{$galleries->image}}" alt="{{$galleries->title}}">
            </div>
            <!-- Grid column -->
            @endforeach       
        </div>
    </div>

@endsection