<div class="card card-default">
    <div class="card-header with-border">
        <h3 class="card-title">Add Navbar Menu</h3>

    </div>
    <div class="card-body">

            {{-- {!! Form::open(['method'=>'post','url'=>'mytasks/navbarMenu']) !!} --}}

            <form method="post" action="{{route('navbarMenu.store')}}" enctype="multipart/form-data">
                {{ csrf_field() }}

            <div class="form-group ">
                <label>Parent Menu</label>
                {{Form::select('parent_id',$parentList->pluck('navbar_menu_name','id'),Request::get('parent_id'),['class'=>'form-control select2','style'=>'width:100%;','id'=>'state_id','placeholder'=>
                'Select Parent Name'])}}
            </div>

            <div class="form-group {{ ($errors->has('navbar_menu_name'))?'has-error':'' }} ">
                <label for="navbar_menu_name">Name
                <label class="text-danger"> *</label>
                </label>
                {!! Form::text('navbar_menu_name',null,['class'=>'form-control','placeholder'=>'Enter Menu Name']) !!}
                {!! $errors->first('navbar_menu_name', '<span class="text-danger">:message</span>') !!}
            </div>

            <div class="form-group {{ ($errors->has('navbar_menu_type_id'))?'has-error':'' }}">
            <label>Navbar Menu Type
                <label class="text-danger"> *</label>
            </label>
             <select name="navbar_menu_type_id" class="form-control">
                <option selected disabled="">Select Navbar Menu Type </option>
                    @foreach($navbarType as $navbarTypes)
                        <option value="{{$navbarTypes->id}}">{{$navbarTypes->type_name}}</option>
                    @endforeach
            </select>
            {!! $errors->first('navbar_menu_type_id', '<span class="text-danger">:message</span>') !!}
            </div>

            <div class="form-group {{ ($errors->has('page_slug'))?'has-error':'' }} ">
                <label for="page_slug">Page Slug
                    <label class="text-danger"> *</label>
                </label>
                <select name="page_slug_id" class="form-control">
                <option selected disabled="">Select Page Slug </option>
                    @foreach($pageSlug as $pageSlugs)
                        <option value="{{$pageSlugs->id}}">{{$pageSlugs->slug}}</option>
                    @endforeach
            </select>
                {!! $errors->first('page_slug', '<span class="text-danger">:message</span>') !!}
            </div>

            <div class="form-group {{ ($errors->has('navbar_menus_status'))?'has-error':'' }}">
                <label for="navbar_menus_status">Status
                    <label class="text-danger"> *</label>
                </label><br>
                {{--<label for="item_type" class="control-label align">Item Type<label class="text-danger"> *</label></label><br>--}}
                {{Form::radio('navbar_menus_status', '1','true',['class'=>'flat-red'])}}&nbsp;&nbsp;Active &nbsp;&nbsp;&nbsp;
                {{Form::radio('navbar_menus_status', '0',null,['class'=>'flat-red'])}}&nbsp;&nbsp;Inactive
                {!! $errors->first('navbar_menus_status', '<span class="text-danger">:message</span>') !!}
            </div>

            <!-- /.form group -->
            <div class="card-footer">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <button type="submit" class="btn btn-primary pull-right">Save</button>
                </div>
                <!-- /.card-footer -->

            </div>
            </form>
        {{-- {!! Form::close() !!} --}}


    </div>
    <!-- /.card-body -->
</div>