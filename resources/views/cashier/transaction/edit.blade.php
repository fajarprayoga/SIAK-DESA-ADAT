@extends('admin.template')

@section('header')
    <style>
        /* Menggunakan kelas form-control untuk mengatur lebar elemen select */
        .select2 {
            width: 100%;
            /* padding: .500rem .75rem */
            /* Atur lebar sesuai kebutuhan Anda */
        }

        .select2-container--default .select2-selection--single {
            height: 2.3rem;
            display: flex;
            align-items: center;
            border: 1px solid #ced4da
        }

        .select2-selection__arrow {
            display: flex;
            align-items: center
        }
    </style>
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-9 mx-auto">
            <h6 class="mb-0 text-uppercase">@lang('global.transaction.transaction')</h6>
            <hr>
            <div class="card">
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <ul class="list-unstyled">
                                @foreach ($errors->all() as $error)
                                    <li> {{ $error }} </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                        @livewire('transaction.transaction-form', ['materials' => $materials, "transaction" => $transaction, "update" => true])
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        // $(function () {
        //     // var dateNow = new Date();
        //     console.log(new Date("25-03-2015"));
        // });
        $('#date').bootstrapMaterialDatePicker({
            // currentDate: new Date(),
            format: 'DD-MM-YYYY',
            time: false,
        });

        $(document).ready(function() {
            // alert('ja;')
            formatRp();
        })

        $(document).on('keyup', '.price', function() {
            formatRp()
        });


        function formatRp() {
            var amount = $(".price").map(function(index, value) {
                var rupiah = parseInt($(value).val() == '' ? 0 : $(value).val().split('.').join(""))
                $(value).val(function(index, item) {
                    return item
                        .replace(/\D/g, "")
                        .replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                });
            });
        }
    </script>
@endsection
