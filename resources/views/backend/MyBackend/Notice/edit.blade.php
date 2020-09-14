<div class="card card-default">
    <div class="card-header with-border">
        <h3 class="card-title">Edit&nbsp;</h3>
    </div>

    <div class="card-body">

     {!! Form::model($noticeEdit,['method'=>'PUT','route'=>['notice.update',$noticeEdit->id],'enctype'=>'multipart/form-data']) !!}


        <div class="form-group {{ ($errors->has('title'))?'has-error':'' }}">
            <label>Notice Title
                <label class="text-danger"> *</label>
            </label>
        <input type="text" class="form-control" placeholder="Enter Title" name="title" value="{{@$noticeEdit->title}}">
            {!! $errors->first('title', '<span class="text-danger">:message</span>') !!}
        </div>

        <div class="form-group {{ ($errors->has('user_id'))?'has-error':'' }}">
            <label>User Name
                <label class="text-danger"> *</label>
            </label>

            <select name="user_id" class="form-control">
                                                <option selected disabled="">Select User Name</option>
                                                @foreach($user_id as $user)
                                                    <option value="{{$user->id}}" @if(@$noticeEdit->user_id =="$user->id") selected @endif>{{$user->name}}</option>
                                                @endforeach
                                            </select>
            {!! $errors->first('user_id', '<span class="text-danger">:message</span>') !!}
        </div>

        <div class="form-group {{ ($errors->has('content'))?'has-error':'' }}">
            <label>Content
                <label class="text-danger"> *</label>
            </label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"  placeholder="Enter Contents" name="content">{{@$noticeEdit->content}}</textarea>
            {!! $errors->first('content', '<span class="text-danger">:message</span>') !!}
        </div>

        <div class="form-group {{ ($errors->has('notice_date'))?'has-error':'' }}">
            <label>Notice Date
                <label class="text-danger"> *</label>
            </label>
             <input type="date" class="form-control" name="notice_date"  value="{{@$noticeEdit->notice_date}}">
            {!! $errors->first('notice_date', '<span class="text-danger">:message</span>') !!}
        </div>

        <div class="form-group {{ ($errors->has('file'))?'has-error':'' }}">
            <label>Upload File
                <label class="text-danger"> *</label>
            </label>
             <input type="hidden" name="file">
                <input type="file" class="form-control-file" id="file" name="file" multiple>
            {!! $errors->first('file', '<span class="text-danger">:message</span>') !!}
        </div>

        <div class="form-group {{ ($errors->has('notice_status'))?'has-error':'' }}">
            <label for="notice_status">{{trans('app.status')}} </label><br>
            {{Form::radio('notice_status', 'active',true,['class'=>'minimal-red'])}} {{trans('app.active')}} &nbsp;&nbsp;&nbsp;
            {{Form::radio('notice_status', 'inactive',null,['class'=>'minimal-red'])}} {{trans('app.inactive')}}
        </div>

        <div class="form-group {{ ($errors->has('display_order'))?'has-error':'' }}">
                <label for="display_order">Order
                    <label class="text-danger"> *</label>
                </label>
                <input type="number" class="form-control" placeholder="Enter Display Order" name="display_order" value="{{@$noticeEdit->display_order}}">
                {!! $errors->first('display_order', '<span class="text-danger">:message</span>') !!}
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

