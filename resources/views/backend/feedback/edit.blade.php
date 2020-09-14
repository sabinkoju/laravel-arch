@extends('backend.layouts.app')
@section('title')
    Feedback Edit
@endsection
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
            <!-- Content Header (Page header) -->
            <section class="content-header">

                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Feedback</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Feedback</li>
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
                    <div class="col-md-12" id="listing">
                        <div class="card card-default">
                            <div class="card-header with-border">
                                <h3 class="card-title">Feedback</h3>

                                <a href="{{url('feedback/create')}}" class="pull-right boxTopButton" id="add"
                                   data-toggle="tooltip" title="Add New"><i class="fa fa-plus-circle fa-2x" style="font-size: 20px;"></i></a>

                                <a href="{{url('/feedback')}}" class="pull-right boxTopButton" data-toggle="tooltip"
                                   title="View All"><i class="fa fa-list fa-2x" style="font-size: 20px;"></i></a>

                                <a href="{{URL::previous()}}" class="pull-right boxTopButton" data-toggle="tooltip"
                                   title="Go Back">
                                    <i class="fa fa-arrow-circle-left fa-2x" style="font-size: 20px;"></i></a>
                            </div>
                            <div class="card-body">
                                {!! Form::model($edits, ['method'=>'put','route'=>['feedback.update',$edits->id],'enctype'=>'multipart/form-data','file'=>true]) !!}
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">

                                            <div class="form-group col-md-6 {{ ($errors->has('category'))?'has-error':'' }}">
                                                <label>Type
                                                </label><label class="text-danger">*</label>
                                                {!! Form::select('category',$categories,null,['id' => 'complainerType','style' => 'width:100%','class'=>'form-control select2','placeholder'=>'Please Select Category
                                                        Type']) !!}
                                                {!! $errors->first('category', '<span class="text-danger">:message</span>') !!}
                                            </div>

                                            <div class="form-group col-md-6 {{ ($errors->has('title'))?'has-error':'' }}">
                                                <label for="feature">Title </label>
                                                {{ Form::text('title',null,['placeholder'=>'Write Down','class' => 'form-control']) }}
                                                {!! $errors->first('title', '<span class="label label-danger">:message</span>') !!}
                                            </div>
                                        </div>

                                        <div class="form-group {{ ($errors->has('url'))?'has-error':'' }}">
                                            <label for="feature">URL</label><br>
                                            {{ Form::text('url',null,['placeholder'=>'Please Enter Url','class' => 'form-control']) }}
                                            {!! $errors->first('url', '<span class="label label-danger">:message</span>') !!}
                                        </div>

                                        <div class="form-group {{ ($errors->has('description'))?'has-error':'' }}">
                                            <label for="feature">Details</label><br>
                                            {{ Form::textarea('description',null,['placeholder'=>'Write Down','class' => 'textarea', 'style'=>'width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px']) }}
                                            {!! $errors->first('description', '<span class="label label-danger">:message</span>') !!}
                                        </div>

                                        <div class="form-group">
                                            {{Form::label('attachment','Files / Attachments')}}
                                            {{Form::file('attachment[]', array('class' => 'form-control','multiple' => 'true'))}}
                                            {!! $errors->first('attachment.*', '<span class="label label-danger">:message</span>') !!}
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">
                                                Update
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                {{ Form::close() }}
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </section>
    </div>
@endsection