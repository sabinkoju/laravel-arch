<footer class="main-footer">
    <?php $date=date('Y');?>
    <strong>Copyright &copy; 2020-{{$date}} <a href="http://adminlte.io">Young Minds Creation Pvt. Ltd.</a></strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Powered by : </b> Young Minds Creation Pvt. Ltd.
    </div>
</footer>

<!-- jQuery -->
<script src="{{url('plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{url('plugins/jquery-ui/jquery-ui.min.js')}}"></script>

<!-- Bootstrap 4 -->
<script src="{{url('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- overlayScrollbars -->
<script src="{{url('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>

<!-- AdminLTE App -->
<script src="{{url('/dist/js/adminlte.min.js')}}"></script>

<!-- DataTables -->
<script src="{{url('plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{url('plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>

<!-- Select2 -->
<script src="{{url('plugins/select2/js/select2.full.min.js')}}"></script>
<script src={{url("lib/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js")}}></script>
<!-- datetimepicker -->

<!-- Bootstrap Switch -->
<script src="{{url('plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>

<!-- bootstrap color picker -->
<script src="{{url('plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
<!-- datetimepicker -->
<script src={{url("plugins/iCheck/icheck.min.js")}}></script>


<script>
    $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
        });
    });
</script>
<script>
    $(function () {

        $('#example3').DataTable({
            "paging": false,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
        });
    });
</script>

<script>
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
</script>

{{--<script>--}}
    {{--//Date picker--}}
    {{--$('#datepicker').datepicker({--}}
        {{--autoclose: true--}}
    {{--})--}}
    {{--$('#email_date').datepicker({--}}
        {{--autoclose: true--}}
    {{--})--}}
{{--</script>--}}



{{--<script>--}}
    {{--//Date picker--}}
    {{--$('#datepicker1').datepicker({--}}
        {{--autoclose: true--}}
    {{--})--}}
{{--</script>--}}
{{--<script>--}}
    {{--//Date picker--}}
    {{--$('#datepicker2').datepicker({--}}
        {{--autoclose: true--}}
    {{--})--}}
{{--</script>--}}
{{--<script>--}}
    {{--//Date picker--}}
    {{--$('#datepicker3').datepicker({--}}
        {{--autoclose: true--}}
    {{--})--}}
{{--</script>--}}

{{--<script>--}}

    {{--//iCheck for checkbox and radio inputs--}}
    {{--$('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({--}}
        {{--checkboxClass: 'icheckbox_minimal-blue',--}}
        {{--radioClass   : 'iradio_minimal-blue'--}}
    {{--})--}}
    {{--//Red color scheme for iCheck--}}
    {{--$('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({--}}
        {{--checkboxClass: 'icheckbox_minimal-red',--}}
        {{--radioClass   : 'iradio_minimal-red'--}}
    {{--})--}}
    {{--//Flat red color scheme for iCheck--}}
    {{--$('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({--}}
        {{--checkboxClass: 'icheckbox_flat-green',--}}
        {{--radioClass   : 'iradio_flat-green'--}}
    {{--})--}}

{{--</script>--}}

<script>
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })

        //Bootstrap Duallistbox
//        $('.duallistbox').bootstrapDualListbox()

        //Colorpicker
        $('.my-colorpicker1').colorpicker()
        //color picker with addon
        $('.my-colorpicker2').colorpicker()

        $('.my-colorpicker2').on('colorpickerChange', function(event) {
            $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
        });

        $("input[data-bootstrap-switch]").each(function(){
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        });



    })
</script>
