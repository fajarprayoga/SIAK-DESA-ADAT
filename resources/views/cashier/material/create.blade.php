@extends('admin.template')

@section('content')
    <div class="row">
        <div class="col-xl-9 mx-auto">
            <h6 class="mb-0 text-uppercase">@lang('global.material.title')</h6>
            <hr>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('cashier.material.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="code" class="form-label">@lang('global.material.code')</label>
                            <input class="form-control" type="text" id="code" name="code" required>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">@lang('global.material.name')</label>
                            <input class="form-control" type="text" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label ">@lang('global.material.price')</label>
                            <input class="form-control price" type="text" id="price" name="price" required>
                        </div>
                        <div class="mb-3">
                            <label for="cogs" class="form-label ">@lang('global.material.cogs')</label>
                            <input class="form-control price" type="text" id="cogs" name="cogs" required>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        $('#date').bootstrapMaterialDatePicker({
            // currentDate: new Date(),
            format: 'DD-MM-YYYY',
            time: false,
        });


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
