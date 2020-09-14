<div class="card card-default">
    <div class="card-header with-border">
        <h3 class="card-title">Edit&nbsp;</h3>
    </div>

    <div class="card-body">

     {!! Form::model($postEdit,['method'=>'PUT','route'=>['posts.update',$postEdit->id],'enctype'=>'multipart/form-data']) !!}


        <div class="form-group {{ ($errors->has('title'))?'has-error':'' }}">
            <label>Title
                <label class="text-danger"> *</label>
            </label>
        <input type="text" class="form-control" placeholder="Enter Title" name="title" value="{{@$postEdit->title}}">
            {!! $errors->first('title', '<span class="text-danger">:message</span>') !!}
        </div>

        <div class="form-group {{ ($errors->has('user_id'))?'has-error':'' }}">
            <label>User Name
                <label class="text-danger"> *</label>
            </label>

            <select name="user_id" class="form-control">
                                                <option selected disabled="">Select User Name</option>
                                                @foreach($user_id as $user)
                                                    <option value="{{$user->id}}" @if(@$postEdit->user_id =="$user->id") selected @endif>{{$user->name}}</option>
                                                @endforeach
                                            </select>
            {!! $errors->first('user_id', '<span class="text-danger">:message</span>') !!}
        </div>

        <div class="form-group {{ ($errors->has('content'))?'has-error':'' }}">
            <label>Content
                <label class="text-danger"> *</label>
            </label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"  placeholder="Enter Contents" name="content">{{@$postEdit->content}}</textarea>
            {!! $errors->first('content', '<span class="text-danger">:message</span>') !!}
        </div>

        <div class="form-group {{ ($errors->has('banner_image'))?'has-error':'' }}">
            <label>Upload Banner Image
                <label class="text-danger"> *</label>
            </label>
             <input type="hidden" name="banner_image">
                 @if($postEdit->banner_image != null)
                    <img src="{{asset('uploads/Post/' .$postEdit->banner_image)}}" alt="Post image" height="100px" width="auto">
                @endif
                    <input type="file" class="form-control-file" id="banner_image" name="banner_image" multiple>
            {!! $errors->first('banner_image', '<span class="text-danger">:message</span>') !!}
        </div>

        <div class="form-group {{ ($errors->has('posts_status'))?'has-error':'' }}">
            <label for="posts_status">{{trans('app.status')}} </label><br>
            {{Form::radio('posts_status', 'active',true,['class'=>'minimal-red'])}} {{trans('app.active')}} &nbsp;&nbsp;&nbsp;
            {{Form::radio('posts_status', 'inactive',null,['class'=>'minimal-red'])}} {{trans('app.inactive')}}
        </div>
        <!-- /.input group -->
    
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

