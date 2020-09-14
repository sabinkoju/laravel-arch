@extends('Frontend.app')
@section('bg-img',asset('Frontend/img/event.jpg'))
@section('title','All Events')
@section('subtitle','Lets Start Our Journey')

@section('main-content')
    <div class="container">
        
        <div class="card-deck">
            @foreach($events as $event)
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{$event->title}}</h5>
                        <p class="card-text">
                            <h6 class="post-subtitle">
                            Start Date:{{$event->start_date}}
                            </h6>
                            <h6 class="post-subtitle">
                            End Date:{{$event->end_date}}
                            </h6>
                            <h6 class="post-subtitle">
                            Start Time:{{$event->start_time}}
                            </h6>
                            <h6 class="post-subtitle">
                            End Time:{{$event->end_time}}
                            </h6>
                            <h6 class="post-subtitle">
                            Venue:{{$event->venue}}
                            </h6>
                        </p>
                    </div>

                    <div class="card-footer">
                        <small class="text-muted">Organized by
                            <a href="#"> {{$event->userType->name}}</a>
                        </small>
                    </div>
                </div>
            @endforeach
        </div>
        <hr>
         <!-- Pager -->
            <div class="d-flex justify-content-center">
                {{$events->links()}}
            </div>
        
    </div>
@endsection
