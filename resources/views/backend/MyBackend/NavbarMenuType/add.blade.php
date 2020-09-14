<div class="card card-default">
    <div class="card-header with-border">
        <h3 class="card-title">Add&nbsp;</h3>
    </div>

    <div class="card-body">

     <form method="post" action="{{route('navbarMenuType.store')}}" enctype="multipart/form-data">
        {{ csrf_field() }}

    <!-- /.input group -->
        <div class="form-group {{ ($errors->has('type_name'))?'has-error':'' }}">
            <label>Navbar Menu Title
                <label class="text-danger"> *</label>
            </label>
             <input type="text" class="form-control" placeholder="Enter Title" name="type_name">
            {!! $errors->first('type_name', '<span class="text-danger">:message</span>') !!}
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

