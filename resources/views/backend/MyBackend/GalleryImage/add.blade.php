<div class="card card-default">
    <div class="card-header with-border">
        <h3 class="card-title">Add&nbsp;</h3>
    </div>

    <div class="card-body">

     <form method="post" action="{{route('galleryImage.store')}}" enctype="multipart/form-data">
        {{ csrf_field() }}

    <!-- /.input group -->
        <div class="form-group {{ ($errors->has('title'))?'has-error':'' }}">
            <label>Title
                <label class="text-danger"> *</label>
            </label>
             <input type="text" class="form-control" placeholder="Enter Title" name="title">
            {!! $errors->first('title', '<span class="text-danger">:message</span>') !!}
        </div>

         <div class="form-group {{ ($errors->has('gallery_id'))?'has-error':'' }}">
            <label>Gallery Type
                <label class="text-danger"> *</label>
            </label>

            <select name="gallery_id" class="form-control">
                <option selected disabled="">Select Gallery Type </option>
                    @foreach($gallery_id as $glr)
                        <option value="{{$glr->id}}">{{$glr->gallery_name}}</option>
                    @endforeach
            </select>

             {{-- {{Form::select('gallery_id',$gallery_id->pluck('gallery_name','id'),Request::get('gallery_id'),['class'=>'form-control select2','style'=>'width:100%;','id'=>'gallery_id','placeholder'=>
            'Select Gallery Type'])}} --}}
            {!! $errors->first('gallery_id', '<span class="text-danger">:message</span>') !!}
        </div>

        <div class="form-group {{ ($errors->has('image'))?'has-error':'' }}">
            <label>Image
                <label class="text-danger"> *</label>
            </label>
             <input type="file" class="form-control-file" id="image" name="image" multiple>
            {!! $errors->first('image', '<span class="text-danger">:message</span>') !!}
        </div>

        <div class="form-group {{ ($errors->has('gallery_image_status'))?'has-error':'' }}">
            <label for="gallery_image_status">{{trans('app.status')}} </label><br>
            {{Form::radio('gallery_image_status', 'active',true,['class'=>'minimal-red'])}} {{trans('app.active')}} &nbsp;&nbsp;&nbsp;
            {{Form::radio('gallery_image_status', 'inactive',null,['class'=>'minimal-red'])}} {{trans('app.inactive')}}
        </div>

        <div class="form-group {{ ($errors->has('display_order'))?'has-error':'' }}">
                <label for="display_order">Order
                    <label class="text-danger"> *</label>
                </label>
                <input type="number" class="form-control" placeholder="Enter Display Order" name="display_order">
                {!! $errors->first('display_order', '<span class="text-danger">:message</span>') !!}
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
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->

