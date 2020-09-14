<div class="card card-default">
    <div class="card-header with-border">
        <h3 class="card-title">Add&nbsp;</h3>
    </div>

    <div class="card-body">

     <form method="post" action="{{route('gallery.store')}}" enctype="multipart/form-data">
        {{ csrf_field() }}

    <!-- /.input group -->
        <div class="form-group {{ ($errors->has('gallery_name'))?'has-error':'' }}">
            <label>Gallery Title
                <label class="text-danger"> *</label>
            </label>
             <input type="text" class="form-control" placeholder="Enter Title" name="gallery_name">
            {!! $errors->first('gallery_name', '<span class="text-danger">:message</span>') !!}
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

