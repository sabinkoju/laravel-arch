<div class="card card-default">
    <div class="card-header with-border">
        <h3 class="card-title">Edit&nbsp;</h3>
    </div>

    <div class="card-body">

     {!! Form::model($galleryImageEdit,['method'=>'PUT','route'=>['galleryImage.update',$galleryImageEdit->id],'enctype'=>'multipart/form-data']) !!}


        <div class="form-group {{ ($errors->has('title'))?'has-error':'' }}">
            <label>Title
                <label class="text-danger"> *</label>
            </label>
        <input type="text" class="form-control" placeholder="Enter Title" name="title" value="{{@$galleryImageEdit->title}}">
            {!! $errors->first('title', '<span class="text-danger">:message</span>') !!}
        </div>

        <div class="form-group {{ ($errors->has('gallery_id'))?'has-error':'' }}">
            <label>Gallery Type
                <label class="text-danger"> *</label>
            </label>

            <select name="gallery_id" class="form-control">
                                                <option selected disabled="">Select Gallery Type </option>
                                                @foreach($gallery_id as $glr)
                                                    <option value="{{$glr->id}}" @if(@$galleryImageEdit->gallery_id =="$glr->id") selected @endif>{{$glr->gallery_name}}</option>
                                                @endforeach
                                            </select>
            {!! $errors->first('gallery_id', '<span class="text-danger">:message</span>') !!}
        </div>

        <div class="form-group {{ ($errors->has('image'))?'has-error':'' }}">
            <label>Image
                <label class="text-danger"> *</label>
            </label>
            <input type="hidden" name="image">
                 @if($galleryImageEdit->image != null)
                    <img src="{{asset('Backend/GalleryImage/' .$galleryImageEdit->image)}}" alt="Gallery image" height="100px" width="auto">
                @endif
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
                <input type="number" class="form-control" placeholder="Enter Display Order" name="display_order" value="{{@$galleryImageEdit->display_order}}">
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

