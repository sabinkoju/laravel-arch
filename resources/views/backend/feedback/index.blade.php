@extends('backend.layouts.app')
@section('title')
    Feedback
@endsection
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
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
            <div class="card card-default">
                <div class="card-header with-border">
                    <h3 class="card-title"><strong><i class="fa fa-list"></i> Feedback</strong></h3>
                    <a href="{{url('/feedback/create')}}" class="pull-right cardTopButton" id="add" data-toggle="tooltip"
                       title="Add New"><i class="fa fa-plus-circle fa-2x" style="font-size:20px;"></i></a>

                    <a href="{{url('/feedback')}}" class="pull-right cardTopButton" data-toggle="tooltip"
                       title="View All"><i class="fa fa-list fa-2x" style="font-size:20px;"></i></a>

                    <a href="{{URL::previous()}}" class="pull-right cardTopButton" data-toggle="tooltip" title="Go Back">
                        <i class="fa fa-arrow-circle-left fa-2x" style="font-size:20px;"></i></a>
                </div>
                <div class="card-header">
                    <button class="btn btn-success" onclick="exportToExcel('results')"><i class="fa fa-file-excel-o"></i> Export To Excel</button>
                    <button class="btn btn-default" id="exportToPDF"><i class="fa fa-file-pdf-o text-danger"></i> PDF</button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">

                        <table id="example1" class="table table-bordered table-hover table-responsive">
                            <thead>
                            <tr>
                                <th style="width: 10px">SN</th>
                                <th>Title</th>
                                <th style="width: 50px">Type</th>
                                <th>Date</th>
                                <th style="width: 50px" class="text-right">{{trans('app.action')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($feedbacks as $key=>$feedback)
                                <tr>
                                    <th scope=row>{{++$key}}</th>
                                    <td>{{$feedback->title}}</td>
                                    <td>
                                        @if($feedback->category == 'bug')
                                            <button class="btn btn-block btn-danger btn-xs">Bug / Error</button>
                                        @elseif($feedback->category == 'suggestion')
                                            <button class="btn btn-block btn-primary btn-xs">Suggestion</button>
                                        @else
                                            <button class="btn btn-block btn-success btn-xs">Feedback</button>
                                        @endif
                                    </td>
                                    <td>{{$feedback->date}}</td>
                                    <td class="text-right">
                                        <a href="{{url('feedback/'.$feedback->id .'/edit')}}"
                                           class="text-info btn btn-xs btn-default">
                                            <i class="fa fa-pencil-square-o"></i>
                                        </a>
                                        <a href="{{url('feedback/'.$feedback->id)}}"
                                           class="text-info btn btn-xs btn-default">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            </div> {{--cONTAINER FLUID CLOSE--}}

        <!-- to print excel -->
            <div id="results" style="display: none">
                @include('backend.feedback.excel')
            </div>
        </section>
    </div>
@endsection
@section('js')

    {{--<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>--}}
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>

    <script type="text/javascript">
        $("body").on("click", "#exportToPDF", function () {
            html2canvas($('#example1')[0], {
                onrendered: function (canvas) {
                    var data = canvas.toDataURL();
                    var docDefinition = {
                        content: [{
                            image: data,
                            width: 500
                        }]
                    };
                    pdfMake.createPdf(docDefinition).download("Table.pdf");
                }
            });
        });
    </script>

    <script>
        function exportToExcel(tableID, filename = '') {
            var downloadLink;
            var dataType = 'application/vnd.ms-excel';
            var tableSelect = document.getElementById(tableID);
            var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');

            // Specify file name
            filename = filename ? filename + '.xls' : 'feedback.xls';

            // Create download link element
            downloadLink = document.createElement("a");

            document.body.appendChild(downloadLink);

            if (navigator.msSaveOrOpenBlob) {
                var blob = new Blob(['\ufeff', tableHTML], {
                    type: dataType
                });
                navigator.msSaveOrOpenBlob(blob, filename);
            } else {
                // Create a link to the file
                downloadLink.href = 'data:' + dataType + ', ' + tableHTML;

                // Setting the file name
                downloadLink.download = filename;

                //triggering the function
                downloadLink.click();
            }
        }
    </script>
@endsection