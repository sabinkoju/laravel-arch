@extends('backend.layouts.app')
@section('title')
    Page
@endsection
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <section class="content-header">

            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>My Tasks</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/dashboard')}}"> {{trans('app.dashboard')}}</a></li>
                            <li class="breadcrumb-item ">My Tasks</li>
                            <li class="breadcrumb-item active">Page</li>
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
                                        <h3 class="card-title"><i class="fa fa-list"></i> Page</h3>
                                        <?php

                                        $permission = helperPermissionLink(url('/mytasks/pages'), url('/mytasks/pages'));

                                        $allowEdit = $permission['isEdit'];

                                        $allowDelete = $permission['isDelete'];

                                        $allowAdd = $permission['isAdd'];
                                        ?>
                                    </div>
                                    <div class="card-body">
                                        <table id="example1" class="table table-striped table-bordered table-hover table-responsive">
                                            <thead>
                                            <tr>
                                                <th style="width: 10px;">S.N.</th>
                                                <th>Title</th>
                                                <th>Content</th>
                                                <th>User Name</th>
                                                <th>File</th>
                                                <th>Slug</th>
                                                <th>Status</th>
                                                <th style="width: 10px;"
                                                    class="text-right">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $i = 1;?>
                                            @forelse($pages as $page)
                                                <tr>
                                                    <th scope=row>{{$i}}</th>
                                                    <td>{{$page->page_title}}</td>
                                                    <td>{{$page->content}}</td>
                                                    <td>{{$page->userType->name}}</td>
                                                    <td><a href="{{$page->file}}"download>Download</a></td>
                                                    <td>{{$page->slug}}</td>
                                                    <td class="text-center">
                                                            @if($page->pages_status == 'active')
                                                                <a  class="label label-success stat" href="{{url('mytasks/pages/status',$page->id)}}">
                                                                    <strong class="stat"> {{trans('app.active')}}
                                                                    </strong>
                                                                </a>

                                                            @elseif($page->pages_status == 'inactive')
                                                                <a class="label label-danger stat" href="{{url('mytasks/pages/status',$page->id)}}">
                                                                    <strong class="stat"> {{trans('app.inactive')}}
                                                                    </strong>
                                                                </a>
                                                            @endif
                                                        </td>

                                                    <td class="text-right row" style="margin-right: 0px;">
                                                        @if($allowEdit)
                                                            <a href="{{route('pages.edit',[$page->id])}}"
                                                               class="text-info btn btn-xs btn-default" data-toggle="tooltip"
                                                               data-placement="top" title="Edit" style="margin: 0px 5px;">
                                                                <i class="fa fa-pencil-square-o"></i>
                                                            </a>
                                                        @endif

                                                        @if($allowDelete)
                                                            {!! Form::open(['method' => 'DELETE', 'route'=>['pages.destroy',
                                                                $page->id],'class'=> 'inline']) !!}
                                                            <button type="submit"
                                                                    class="btn btn-danger btn-xs deleteButton actionIcon"
                                                                    data-toggle="tooltip"
                                                                    data-placement="top" title="Delete"
                                                                    onclick="javascript:return confirm('Are you sure you want to delete?');">
                                                                <i class="fa fa-trash"></i>
                                                            </button>

                                                            {!! Form::close() !!}
                                                        @endif

                                                    </td>
                                                </tr>
                                                <?php $i++; ?>
                                            @empty
                                            @endforelse
                                            </tbody>
                                        </table>

                                    </div>

                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>

                            @if($allowAdd)

                                <div class="col-md-3">
                                    @if(\Request::segment(4)=='edit')
                                        @include('backend.MyBackend.Pages.edit')
                                    @else
                                        @include('backend.MyBackend.Pages.add')
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