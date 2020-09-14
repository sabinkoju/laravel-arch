<div class="card card-default">
    <div class="card-header with-border">
        <h3 class="card-title">Edit&nbsp;</h3>
    </div>

    <div class="card-body">

     {!! Form::model($eventEdit,['method'=>'PUT','route'=>['events.update',$eventEdit->id]]) !!}


        <div class="form-group {{ ($errors->has('title'))?'has-error':'' }}">
            <label>Title
                <label class="text-danger"> *</label>
            </label>
            <input type="text" class="form-control" placeholder="Enter Title" name="title" value="{{@$eventEdit->title}}">
            {!! $errors->first('title', '<span class="text-danger">:message</span>') !!}
        </div>

        <div class="form-group {{ ($errors->has('user_id'))?'has-error':'' }}">
            <label>User Name
                <label class="text-danger"> *</label>
            </label>

            <select name="user_id" class="form-control">
                                                <option selected disabled="">Select User Name</option>
                                                @foreach($user_id as $user)
                                                    <option value="{{$user->id}}" @if(@$eventEdit->user_id =="$user->id") selected @endif>{{$user->name}}</option>
                                                @endforeach
                                            </select>
            {!! $errors->first('user_id', '<span class="text-danger">:message</span>') !!}
        </div>

        <div class="form-group {{ ($errors->has('start_date'))?'has-error':'' }}">
            <label>Start Date
                <label class="text-danger"> *</label>
            </label>
             <input type="date" class="form-control" name="start_date" value="{{@$eventEdit->start_date}}">
            {!! $errors->first('start_date', '<span class="text-danger">:message</span>') !!}
        </div>

        <div class="form-group {{ ($errors->has('end_date'))?'has-error':'' }}">
            <label>End Date
                <label class="text-danger"> *</label>
            </label>
             <input type="date" class="form-control" name="end_date" value="{{@$eventEdit->end_date}}">
            {!! $errors->first('end_date', '<span class="text-danger">:message</span>') !!}
        </div>

        <div class="form-group {{ ($errors->has('start_time'))?'has-error':'' }}">
            <label>Start Time
                <label class="text-danger"> *</label>
            </label>
             <input type="time" class="form-control" name="start_time" value="{{@$eventEdit->start_time}}">
            {!! $errors->first('start_time', '<span class="text-danger">:message</span>') !!}
        </div>

        <div class="form-group {{ ($errors->has('end_time'))?'has-error':'' }}">
            <label>End Time
                <label class="text-danger"> *</label>
            </label>
             <input type="time" class="form-control" name="end_time" value="{{@$eventEdit->end_time}}">
            {!! $errors->first('end_time', '<span class="text-danger">:message</span>') !!}
        </div>

        <div class="form-group {{ ($errors->has('venue'))?'has-error':'' }}">
            <label>Venue
                <label class="text-danger"> *</label>
            </label>
             <input type="text" class="form-control" placeholder="Enter Venue" name="venue" value="{{@$eventEdit->venue}}">
            {!! $errors->first('venue', '<span class="text-danger">:message</span>') !!}
        </div>

        <div class="form-group {{ ($errors->has('events_status'))?'has-error':'' }}">
            <label for="events_status">{{trans('app.status')}} </label><br>
            {{Form::radio('events_status', 'active',true,['class'=>'minimal-red'])}} {{trans('app.active')}} &nbsp;&nbsp;&nbsp;
            {{Form::radio('events_status', 'inactive',null,['class'=>'minimal-red'])}} {{trans('app.inactive')}}
        </div>
    
        <!-- /.form group -->
        <div class="card-footer">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <button type="submit" class="btn btn-primary">{{trans('app.update')}}</button>
            </div>
            <!-- /.card-footer -->
        </div>
        {!! Form::close() !!}


    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->

