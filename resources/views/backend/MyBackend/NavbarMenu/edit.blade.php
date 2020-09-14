<div class="card card-default">
    <div class="card-header with-border">
        <h3 class="card-title">Edit&nbsp;</h3>
    </div>

    <div class="card-body">

     {!! Form::model($navbarEdit,['method'=>'PUT','route'=>['navbarMenu.update',$navbarEdit->id],'enctype'=>'multipart/form-data']) !!}

        <div class="form-group {{ ($errors->has('parent_id'))?'has-error':'' }}">
            <label>Parent Menu</label>
            {{Form::select('parent_id',$parentList->pluck('navbar_menu_name','id'),Request::get('parent_id'),['class'=>'form-control select2','style'=>'width:100%;','id'=>'state_id','placeholder'=>
            'Select Parent Name'])}}
            {!! $errors->first('parent_id', '<span class="text-danger">:message</span>') !!}

        </div>

       <div class="form-group {{ ($errors->has('navbar_menu_name'))?'has-error':'' }} ">
                <label for="navbar_menu_name">Name
                <label class="text-danger"> *</label>
                </label>
               <input type="text" class="form-control" placeholder="Enter Title" name="navbar_menu_name" value="{{@$navbarEdit->navbar_menu_name}}">
                {!! $errors->first('navbar_menu_name', '<span class="text-danger">:message</span>') !!}
            </div>

        <div class="form-group {{ ($errors->has('navbar_menu_type_id'))?'has-error':'' }}">
                <label>Navbar Menu Type
                    <label class="text-danger"> *</label>
                </label>
                <select name="navbar_menu_type_id" class="form-control">
                    <option selected disabled="">Select Navbar Menu Type </option>
                        @foreach($navbarType as $navbarTypes)
                            <option value="{{$navbarTypes->id}}" @if(@$navbarEdit->navbar_menu_type_id =="$navbarTypes->id") selected @endif>{{$navbarTypes->type_name}}</option>
                        @endforeach
                </select>
                {!! $errors->first('navbar_menu_type_id', '<span class="text-danger">:message</span>') !!}
            </div>

        <div class="form-group {{ ($errors->has('page_slug'))?'has-error':'' }} ">
                <label for="page_slug">Page Slug
                    <label class="text-danger"> *</label>
                </label>
                {{-- {!! Form::text('page_slug',null,['class'=>'form-control','placeholder'=>'Enter Page Slug']) !!} --}}
                <select name="page_slug_id" class="form-control">
                <option selected disabled="">Select Page Slug </option>
                    @foreach($pageSlug as $pageSlugs)
                        <option value="{{$pageSlugs->id}}" @if(@$navbarEdit->page_slug_id =="$pageSlugs->id") selected @endif>{{$pageSlugs->slug}}</option>
                    @endforeach
            </select>
                {!! $errors->first('page_slug', '<span class="text-danger">:message</span>') !!}
            </div>


        <div class="form-group {{ ($errors->has('navbar_menus_status'))?'has-error':'' }}">
            <label for="navbar_menus_status">{{trans('app.status')}} </label><br>
            {{Form::radio('navbar_menus_status', 'active',true,['class'=>'minimal-red'])}} {{trans('app.active')}} &nbsp;&nbsp;&nbsp;
            {{Form::radio('navbar_menus_status', 'inactive',null,['class'=>'minimal-red'])}} {{trans('app.inactive')}}
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

