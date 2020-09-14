<div class="card card-default">
    <div class="card-header with-border">
        <h3 class="card-title">Edit&nbsp;</h3>
    </div>

    <div class="card-body">

     {!! Form::model($galleryEdit,['method'=>'PUT','route'=>['gallery.update',$galleryEdit->id]]) !!}


        <div class="form-group {{ ($errors->has('gallery_name'))?'has-error':'' }}">
            <label>Gallery Title
                <label class="text-danger"> *</label>
            </label>
            {!! Form::text('gallery_name',null,['class'=>'form-control','placeholder' => 'Example: Chief Commisioner']) !!}
            {!! $errors->first('gallery_name', '<span class="text-danger">:message</span>') !!}
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

