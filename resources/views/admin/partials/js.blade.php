<script src="{{ asset('/assets/js/bootstrap.bundle.min.js')}}"></script>
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>   --}}
<!--plugins-->

<script src="{{ asset('/assets/plugins/simplebar/js/simplebar.min.js')}}"></script>
<script src="{{ asset('/assets/plugins/metismenu/js/metisMenu.min.js')}}"></script>
<script src="{{ asset('/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
<script src="{{ asset('/assets/js/pace.min.js')}}"></script>
<script src="{{ asset('/assets/plugins/chartjs/js/Chart.min.js')}}"></script>
<script src="{{ asset('/assets/plugins/chartjs/js/Chart.extension.js')}}"></script>
<script src="{{ asset('/assets/plugins/apexcharts-bundle/js/apexcharts.min.js')}}"></script>
<script src="{{asset('/assets/plugins/jquery-confirm/js/jquery-confirm.js')}}"></script>
<script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<script src="{{asset('assets/plugins/toastr/toastr.min.js')}}"></script>
<script src="{{asset('assets/plugins/sweetalert/sweetalert.min.js')}}"></script>
<!--app-->
<script src="{{ asset('/assets/js/app.js')}}"></script>
<script src="{{asset('assets/plugins/datetimepicker/js/legacy.js')}}"></script>
<script src="{{asset('assets/plugins/datetimepicker/js/picker.js')}}"></script>
<script src="{{asset('assets/plugins/datetimepicker/js/picker.time.js')}}"></script>
<script src="{{asset('assets/plugins/datetimepicker/js/picker.date.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap-material-datetimepicker/js/moment.min.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.min.js')}}"></script>
<script src="{{asset('assets/js/form-date-time-pickes.js')}}"></script>
{{-- <script src="{{ asset('assets/plugins/datepicker/datepicker.js') }}"></script> --}}
<script src="/assets/plugins/jquery-confirm/js/jquery-confirm.js"></script>
<script src="/assets/plugins/parsley-js/parsley.js"></script>
<script type="text/javascript">
      $(function () {
        $('.select2').select2({
            placeholder: "Pilih",
        })

        @if(session()->has('success'))
            toastr.success("{{session('success')}}")


        @endif

        @if(session()->has('error'))
        $.alert("{{session('error')}}")
        @endif

        // $('.datetimepicker').bootstrapMaterialDatePicker({
        //     format: 'DD/MM/YYYY',
        // })
    });

</script>
