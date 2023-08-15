@extends('admin.template')

@section('content')
    <h1>@lang('global.material.title')</h1>

    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3 border-right-0">@lang('global.material.title')</div>
        <div class="ms-auto">
            <div class="btn-group">
                @can('isCashier')
                    <a href="{{ route('cashier.material.create') }}" class="text-white btn btn-primary ">@lang('global.app.add')</a>
                @endcan
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive mt-3">
                <table class="table align-middle table-bordered data-table">
                    {{-- <a href="{{ route('cashier.material.create') }}" class="btn btn-success btn-md my-1">@lang('global.app.add') @lang('global.account.title')</a> --}}
                    <thead class="table-secondary">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
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

            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('cashier.material.materialdata') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'name', name: 'name'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });

        });

        // $('#delete').on( 'draw.dt', function () {
        //     alert( 'Table redrawn' );
        // } );
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
                        url:' {{ url("/cashier/material")}}/' + id,
                        type:'delete',
                        data:'_token = <?php echo csrf_token() ?>',
                        success:function(data) {
                            //   $("#msg").html(data.msg);
                            // console.log(data);
                            $('.data-table').DataTable().ajax.reload();
                            // alert(data);
                            swal("Delete Success", {
                                icon: "success",
                            });
                        },
                        error: function(err) {
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
