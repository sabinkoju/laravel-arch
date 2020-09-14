<div class="card card-default">
    <div class="card-header with-border">
        <h3 class="card-title">Add&nbsp;</h3>

    </div>
    <div class="card-body">
    {{-- {!! Form::open(['method'=>'post','url'=>'mytasks/news']) !!} --}}

     <form method="post" action="{{route('news.store')}}" enctype="multipart/form-data">
        {{ csrf_field() }}

    <!-- /.input group -->
        <div class="form-group {{ ($errors->has('title'))?'has-error':'' }}">
            <label>News Title
                <label class="text-danger"> *</label>
            </label>
             <input type="text" class="form-control" placeholder="Enter Title" name="title">
            {!! $errors->first('title', '<span class="text-danger">:message</span>') !!}
        </div>

        <div class="form-group {{ ($errors->has('user_id'))?'has-error':'' }}">
            <label>User Name
                <label class="text-danger"> *</label>
            </label>
             <select name="user_id" class="form-control">
                <option selected disabled="">Select User Name </option>
                    @foreach($user_id as $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
            </select>
            {!! $errors->first('user_id', '<span class="text-danger">:message</span>') !!}
        </div>

        <div class="form-group {{ ($errors->has('detail'))?'has-error':'' }}">
            <label>Detail
                <label class="text-danger"> *</label>
            </label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"  placeholder="Enter Details" name="detail"></textarea>
            {!! $errors->first('detail', '<span class="text-danger">:message</span>') !!}
        </div>

        <div class="form-group {{ ($errors->has('file'))?'has-error':'' }}">
            <label>Upload File
                <label class="text-danger"> *</label>
            </label>
             <input type="hidden" name="file">
                <input type="file" class="form-control-file" id="file" name="file" multiple>
            {!! $errors->first('file', '<span class="text-danger">:message</span>') !!}
        </div>

        <div class="form-group {{ ($errors->has('news_status'))?'has-error':'' }}">
            <label for="news_status">{{trans('app.status')}} </label><br>
            {{Form::radio('news_status', 'active',true,['class'=>'minimal-red'])}} {{trans('app.active')}} &nbsp;&nbsp;&nbsp;
            {{Form::radio('news_status', 'inactive',null,['class'=>'minimal-red'])}} {{trans('app.inactive')}}
        </div>

        
        <!-- /.input group -->
        
        <!-- /.form group -->
        <div class="card-footer">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <button type="submit" class="btn btn-primary">{{trans('app.save')}}&nbsp;</button>
            </div>
            <!-- /.card-footer -->

        </div>
     </form>
        {{-- {!! Form::close() !!} --}}

    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->

