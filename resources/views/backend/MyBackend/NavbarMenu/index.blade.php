@extends('backend.layouts.app')
@section('title')
   Navbar Menus
@endsection
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <section class="content-header">

            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Navbar Menu</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item">My Tasks</li>
                            <li class="breadcrumb-item active">Navbar Menu</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
            @include('backend.message.flash')
            <div class="row">
                @if(helperPermission()['isAdd'])
                    <div class="col-md-9" id="listing">
                        @else
                            <div class="col-md-12" id="listing">
                                @endif
                                <div class="card card-default">
                                    <div class="card-header with-border">
                                        <h3 class="card-title"><i class="fa fa-list"></i> Navbar Menu</h3>
                                        <?php

                                        $permission = helperPermission(url('/mytasks/navbarMenu'), url('/mytasks/navbarMenu'));

                                        $allowEdit = $permission['isEdit'];

                                        $allowDelete = $permission['isDelete'];

                                        $allowAdd = $permission['isAdd'];
                                        ?>
                                        <a href="{{url('mytasks/navbarMenu')}}" class="pull-right boxTopButton"
                                           data-toggle="tooltip" title="View All"><i class="fa fa-list fa-2x" style="font-size:20px;"></i></a>
                                        <a href="{{url('mytasks/navbarMenu')}}" class="pull-right  boxTopButton"
                                           data-toggle="tooltip" title="Go Back"><i
                                                    class="fa fa-arrow-circle-left fa-2x" style="font-size:20px;"></i></a>
                                    </div>
                                    <div class="card-body">

                                        {{-- @if(!count($navbar)<=0) --}}
                                            <div class="table-responsive">
                                                <table id="example1"
                                                       class="table table-hover table-striped  table-bordered table-responsive">
                                                    <thead>
                                                    <tr>
                                                        <th style="width: 10px">S.N</th>
                                                        <th>Navbar Menu</th>
                                                        <th>Menu Type</th>
                                                        <th>Page Slug</th>
                                                        <th style="width: 30px" class="text-centered">Status</th>
                                                        <th style="width: 50px" class="text-right">Action</th>
                                                    </tr>
                                                    </thead>

                                                    <tbody>
                                                    <?php
                                                    $i = 1;
                                                    ?>
                                                    @foreach($navbar as $navbars)
                                                        <tr>
                                                            <th scope=row>{{$i++}}</th>
                                                            <td>{{$navbars->navbar_menu_name}}</td>
                                                           <td>{{$navbars->navbarMenuType->type_name}}</td>
                                                            <td>{{$navbars->pageSlug->slug}}</td>
                                                            <td class="text-center">
                                                                @if($navbars->navbar_menus_status== 'active')
                                                                    <a
                                                                            class="label label-success stat"
                                                                            href="{{url('/mytasks/navbarMenu/status/'.$navbars->id)}}">
                                                                        <strong class="stat"> Active
                                                                        </strong>
                                                                    </a>

                                                                @elseif($navbars->navbar_menus_status== 'inactive')
                                                                    <a
                                                                            class="label label-danger stat"
                                                                            href="{{url('/mytasks/navbarMenu/status/'.$navbars->id)}}">
                                                                        <strong class="stat"> Inactive
                                                                        </strong>
                                                                    </a>
                                                                @endif
                                                            </td>
                                                           
                                                            @if($allowEdit)
                                                                <td class="text-right row" style="margin-right: 0px;">
                                                                    <a href="{{route('navbarMenu.edit',[$navbars->id])}}"
                                                                       class="text-info btn btn-xs btn-default"
                                                                       data-toggle="tooltip"
                                                                       data-placement="top" title="Edit">
                                                                        <i class="fa fa-pencil-square-o"></i>
                                                                    </a>&nbsp;
                                                                    @endif

                                                                    @if($allowDelete)
                                                                        {!! Form::open(['method' => 'DELETE', 'class'=>'inline', 'route'=>['navbarMenu.destroy',
                                                                            $navbars->id]]) !!}
                                                                        <button type="submit"
                                                                                class="btn btn-danger btn-xs deleteButton actionIcon"
                                                                                data-toggle="tooltip"
                                                                                data-placement="top" title="Delete"
                                                                                onclick="javascript:return confirm('Are you sure you want to delete?');">
                                                                            <i class="fas fa-trash"></i>
                                                                        </button>

                                                                        {!! Form::close() !!}
                                                                    @endif
                                                                </td>
                                                        </tr>
                                                    @endforeach

                                                    </tbody>

                                                </table>
                                            </div>


                                        {{-- @else
                                            <div class="col-md-12">
                                                <label class="form-control label-danger">No records found</label>
                                            </div>
                                        @endif --}}

                                    </div>

                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>


                            @if($allowAdd)
                                <div class="col-md-3" id="sideForm">
                                    @if(\Request::segment(4)=='edit')
                                        @include('backend.MyBackend.NavbarMenu.edit')
                                    @else
                                        @include('backend.MyBackend.NavbarMenu.add')
                                    @endif

                                </div>
                            @endif
                    </div>
            </div>
            </div>
        </section>
        <!-- /.content -->
    </div>

    <!-- /.content-wrapper -->

@endsection
