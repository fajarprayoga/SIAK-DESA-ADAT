@extends('admin.template')

@section('content')
    {{-- <h1>@lang('global.journal.journal')</h1> --}}
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3 border-right-0">@lang('global.transaction.transaction')</div>
        <div class="ms-auto">
            <div class="btn-group">
                @can('isCashier')
                    <form action="{{route('cashier.transaction.create')}}" method="GET">
                        {{-- @csrf --}}
                        <input type="hidden" name="date" value="{{$date}}">
                        <button type="submit" class="text-white btn btn-primary ">@lang('global.app.add')</button>
                    </form>
                    <a href="{{ route('cashier.transaction.expense', $date) }}" class="text-white btn btn-danger  mx-2">@lang('global.transaction.expense')</a>
                @endcan
                <form action="{{route('cashier.transaction.report')}}" target="_blank" method="GET">
                    {{-- @csrf --}}
                    <input type="hidden" name="date" value="{{$date}}">
                    <button type="submit" class="text-white btn btn-info ">@lang('global.transaction.report')</button>
                </form>
            </div>
        </div>
    </div>
    {{-- <a href="{{ route('admin.journal.create') }}" class="btn btn-success btn-md my-1">@lang('global.app.add') @lang('global.journal.title')</a> --}}
    <div class="card">
        <div class="card-body">
            <div class="table-responsive mt-3">
                <table class="table align-middle table-bordered  data-table">
                    <thead class="table-secondary">
                        <tr>
                            <th>No</th>
                            <th>@lang('global.transaction.vehicle_number')</th>
                            <th>@lang('global.transaction.vehicle')</th>
                            <th>@lang('global.transaction.type_material')</th>
                            <th>@lang('global.transaction.price_material')</th>
                            <th>@lang('global.transaction.nomor')</th>
                            <th>@lang('global.transaction.gosek')</th>
                            {{-- <th>@lang('global.journal.detail')</th> --}}
                            <th width="100px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">


    $(function () {
        var date = "<?php echo $date ?>";
        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url : "{{ route('cashier.transaction.transactiondata') }}",
                data(d) {
                    d.date = date
                }
            },
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'vehicle_number', name: 'nomor kendaraan'},
                {data: 'vehicle', name: 'kendaraan'},
                {data: 'material_id', name: 'material'},
                {data: 'price_material', name: 'harga material'},
                {data: 'nomor', name: 'nomor'},
                {data: 'gosek', name:'gosek'},
                // // {data : 'details', name : 'details'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
            fnRowCallback: function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
                    // console.log(aData);
                if(aData['status'] == 1){
                    $('td', nRow).css('background-color', '#f8f9fa')
                }
            }
        });

    });


    const removeItem =(id) => {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            swal({
                title: "Are you sure?",
                text: "File yang di Hapus tidak bisa di kembalikan !",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url:' {{ url("/cashier/transaction")}}/' + id,
                        type:'delete',
                        data:'_token = <?php echo csrf_token() ?>',
                        success:function(data) {
                            //   $("#msg").html(data.msg);
                            // console.log(data);
                            // alert(data);
                            swal("Delete Success", {
                                icon: "success",
                            });
                            $('.data-table').DataTable().ajax.reload();
                            url = '{{ url("/cashier/transaction")}}';
                            window.location.replace(url);
                        },
                        error: function(err) {
                            console.log(err);
                            swal("Delete Error!", {
                                icon: "error",
                            });
                        }
                    });
                }
            });
        }

    </script>
@endsection
