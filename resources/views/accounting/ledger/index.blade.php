@extends('admin.template')

@section('content')
    {{-- <h1>@lang('global.ledger.ledger')</h1> --}}
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3 border-right-0">@lang('global.ledger.ledger')</div>
        <div class="ms-auto">
            <div class="btn-group">
                @can('isAccounting')
                <a href="{{ route('accounting.ledger.create') }}" class="text-white btn btn-primary ">@lang('global.app.add')</a>
                @endcan
            </div>
        </div>
    </div>
    {{-- <a href="{{ route('admin.ledger.create') }}" class="btn btn-success btn-md my-1">@lang('global.app.add') @lang('global.ledger.title')</a> --}}
    <div class="card">
        <div class="card-body">
            <div class="table-responsive mt-3">
                <table class="table align-middle table-bordered  data-table">
                    <thead class="table-secondary">
                        <tr>
                            <td id="nomor" >No</td>
                            <td>Tanggal</td>
                            <td>Nama</td>
                            <td>Status</td>
                            <td>Note</td>
                            <td>Action</td>
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
        //  $(document).ready(function(){

        // })
        $(function () {

            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('accounting.ledger.ledgerdata') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'register', name: 'register'},
                    {data: 'title', name: 'title'},
                    {data: 'status', name: 'status'},
                    {data: 'note', name: 'note'},
                    // {data : 'details', name : 'details'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });

            // approve


        });

        function approve(id) {
            $.confirm({
                theme: 'material',
                title: 'Warning!',
                content: 'Apakah anda yakin ingin menerima pemesanan ini ?',
                buttons: {
                    Yes: function(){
                    urlsnya = '{{ url("/accounting/ledger")}}/' + id,
                    _token = $('input[name=_token]').val();
                    $.ajax({
                        type: 'PUT',
                        dataType: 'json',
                        data: {_token:_token, status:'approved'},
                        url: urlsnya,
                    })
                    .done(function(response) {
                        if(response == 1){
                        toastr.success("Success")
                        url = '{{ url("/accounting/ledger")}}';
                        window.location.replace(url);
                        }

                    })
                    .fail(function(){
                        $.alert("error");
                        return;
                    })
                    .always(function() {
                        console.log("complete");
                    });
                    },
                    No: function () {
                    return;
                    }
                }
            })
        }

        function rejected (id) {
            $.confirm({
                theme: 'material',
                title: 'Isi Alasan',
                content: '' +
                        '<form action="" class="formName">' +
                        '<div class="form-group">' +
                        '<input class="form-control alasan" placeholder="Masukan Alasan" required>' +
                        '</div>' +
                        '</form>',
                buttons: {
                    Yes: {
                    text:'Submit',
                    btnClass: 'btn-primary',
                    action: function(){
                    var checkrequired = $('input').filter('[required]:visible')
                    var isValid = true;
                    $(checkrequired).each( function() {
                            if ($(this).parsley().validate() !== true) isValid = false;
                    });
                    if(!isValid){
                        $.alert('Mohon masukan alasan');
                        return false;
                    }
                    else{
                        urlsnya = '{{ url("/accounting/ledger")}}/' + id;
                        var alasan = this.$content.find('.alasan').val();
                        _token = $('input[name=_token]').val();
                        $.ajax({
                        type: 'PUT',
                        dataType: 'json',
                        data: {_token:_token, status:'rejected',note:alasan},
                        url: urlsnya,
                        })
                        .done(function(response) {
                        if(response == 1){
                            toastr.success("Success")
                            url = '{{ url("/accounting/ledger")}}';
                            window.location.replace(url);
                        }

                        })
                        .fail(function(){
                        $.alert("error");
                        return;
                        })
                        .always(function() {
                            console.log("complete");
                        });
                    }
                    }

                    },

                    No: function () {
                    return;
                    }
                }
            })
        }


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
                        url:' {{ url("/accounting/ledger")}}/' + id,
                        type:'delete',
                        data:'_token = <?php echo csrf_token() ?>',
                        success:function(data) {
                            //   $("#msg").html(data.msg);
                            // console.log(data);
                            $('.data-table').DataTable().ajax.reload();
                            swal("Delete Success", {
                                icon: "success",
                            });
                        },
                        error: function(err) {
                            swal("Delete Error!", {
                                icon: "error",
                            });
                            console.log(err);
                        }

                    });
                }
            });
        }


    </script>
@endsection

