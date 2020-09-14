@extends('backend.layouts.app')
@section('title')
  Dashboard
@endsection

@section('content')


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <section class="content-header">

            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Dashboard</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-aqua"><i class="fa fa-list-alt"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text"><a href="complaint-list.php" style="color: #0a0a0a">TOTAL COMPLAINTS</a></span>
                            <span class="info-box-number">410</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-red"><i class="fa fa-list-alt"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text"><a href="pendingComplaintsForChiefC.php" style="color:#0a0a0a; ">PENDING COMPLAINTS</a></span>
                            <span class="info-box-number">44</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-aqua"><i class="fa fa-list-alt"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text"><a href="approvedSmritiPatra.php" style="color:#0a0a0a; ">APPROVED SMRITIPATRA</a></span>
                            <span class="info-box-number">90</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-red"><i class="fa fa-list-alt"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text"><a href="pendingSmritiPatra.php" style="color:#0a0a0a; ">PENDING SMRITIPATRA</a></span>
                            <span class="info-box-number">41</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-aqua"><i class="fa fa-list-alt"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text"><a href="approvedScreening.php" style="color:#0a0a0a; ">APPROVED SCREENING</a></span>
                            <span class="info-box-number">35</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-red"><i class="fa fa-list-alt"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text"><a href="pendingScreening.php" style="color:#0a0a0a; ">PENDING SCREENING</a></span>
                            <span class="info-box-number">20</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-aqua"><i class="fa fa-list-alt"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text"><a href="Case-list.php">Total Case</a></span>
                            <span class="info-box-number">90<small></small></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-red"><i class="fa fa-list-alt"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text"><a href="tamili.php" style="color:#0a0a0a; ">Tamili</a></span>
                            <span class="info-box-number">20</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>

                <div class="clearfix visible-sm-block"></div>

            </div>
            </div>
        </section>
    </div>
@endsection