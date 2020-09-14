<div class="card card-default">
    <div class="card-header with-border">
        <h3 class="card-title">Edit&nbsp;</h3>
    </div>

    <div class="card-body">

     {!! Form::model($pagesEdit,['method'=>'PUT','route'=>['pages.update',$pagesEdit->id],'enctype'=>'multipart/form-data']) !!}


        <div class="form-group {{ ($errors->has('page_title'))?'has-error':'' }}">
            <label>Title
                <label class="text-danger"> *</label>
            </label>
        <input type="text" class="form-control" placeholder="Enter Title" name="page_title" value="{{@$pagesEdit->page_title}}">
            {!! $errors->first('page_title', '<span class="text-danger">:message</span>') !!}
        </div>

        <div class="form-group {{ ($errors->has('user_id'))?'has-error':'' }}">
            <label>User Name
                <label class="text-danger"> *</label>
            </label>

            <select name="user_id" class="form-control">
                                                <option selected disabled="">Select User Name</option>
                                                @foreach($user_id as $user)
                                                    <option value="{{$user->id}}" @if(@$pagesEdit->user_id =="$user->id") selected @endif>{{$user->name}}</option>
                                                @endforeach
                                            </select>
            {!! $errors->first('user_id', '<span class="text-danger">:message</span>') !!}
        </div>

        <div class="form-group {{ ($errors->has('content'))?'has-error':'' }}">
            <label>Content
                <label class="text-danger"> *</label>
            </label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"  placeholder="Enter Contents" name="content">{{@$pagesEdit->content}}</textarea>
            {!! $errors->first('content', '<span class="text-danger">:message</span>') !!}
        </div>

        <div class="form-group {{ ($errors->has('slug'))?'has-error':'' }}">
            <label>Page Slug
                <label class="text-danger"> *</label>
            </label>
             <input type="text" class="form-control" placeholder="Enter Page Slug" name="slug" value="{{@$pagesEdit->slug}}">
            {!! $errors->first('slug', '<span class="text-danger">:message</span>') !!}
        </div>

        <div class="form-group {{ ($errors->has('file'))?'has-error':'' }}">
            <label>Upload File
                <label class="text-danger"> *</label>
            </label>
             <input type="hidden" name="file">
                <input type="file" class="form-control-file" id="file" name="file" multiple>
            {!! $errors->first('file', '<span class="text-danger">:message</span>') !!}
        </div>

        <div class="form-group {{ ($errors->has('pages_status'))?'has-error':'' }}">
            <label for="pages_status">{{trans('app.status')}} </label><br>
            {{Form::radio('pages_status', 'active',true,['class'=>'minimal-red'])}} {{trans('app.active')}} &nbsp;&nbsp;&nbsp;
            {{Form::radio('pages_status', 'inactive',null,['class'=>'minimal-red'])}} {{trans('app.inactive')}}
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

