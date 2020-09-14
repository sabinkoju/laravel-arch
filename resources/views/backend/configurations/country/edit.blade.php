<div class="card card-default">
    <div class="card-header with-border">
        <h3 class="card-title">{{trans('app.edit')}} &nbsp;</h3>

    </div>
    <div class="card-body">

        {!! Form::model($edits,['method'=>'PUT','route'=>['country.update',$edits->id]]) !!}


        <div class="form-group {{ ($errors->has('country_name'))?'has-error':'' }}">
            <label>{{trans('app.country')}} {{trans('app.name')}}
                <label class="text-danger"> *</label>
            </label>
            {!! Form::text('country_name',null,['class'=>'form-control','placeholder' => 'Example: Chief Commisioner']) !!}
            {!! $errors->first('country_name', '<span class="text-danger">:message</span>') !!}
        </div>
        <div class="form-group {{ ($errors->has('short_name'))?'has-error':'' }}">
            <label>{{trans('app.short')}} {{trans('app.name')}}
                <label class="text-danger"> *</label>
            </label>
            {!! Form::text('short_name',null,['class'=>'form-control','placeholder' => 'Example: USA']) !!}
            {!! $errors->first('short_name', '<span class="text-danger">:message</span>') !!}
        </div>

        <div class="form-group {{ ($errors->has('status'))?'has-error':'' }}">
            <label for="status">{{trans('app.status')}} </label><br>
            {{Form::radio('status', 'active',true,['class'=>'minimal-red'])}} {{trans('app.active')}} &nbsp;&nbsp;&nbsp;
            {{Form::radio('status', 'inactive',null,['class'=>'minimal-red'])}} {{trans('app.inactive')}}
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