@extends('admin.template')

@section('content')
    <div class="row">
        <div class="col-xl-9 mx-auto">
            <h6 class="mb-0 text-uppercase">@lang('global.account.title')</h6>
            <hr>
            <div class="card">
                <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <ul class="list-unstyled">
                                @foreach($errors->all() as $error)
                                <li> {{ $error }} </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                   <form action="{{ route('cashier.transaction.store') }}" method="POST">
                    @csrf
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                {{-- <input type="hidden" name="date" value="{{$date ? $date : date('d-m-Y')}}"> --}}
                                <div class="mb-3">
                                    <label for="date" class="form-label">@lang('global.transaction.date')</label>
                                    {{-- <input class="form-control " data-date-format="DD MMMM YYYY" type="text" id="register" name="register" required > --}}
                                    <input class="result form-control" type="text"  id="date" value="{{$date ? $date : date('d-m-Y')}}" name="date" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="vehicle_number" class="form-label">@lang('global.transaction.vehicle_number')</label>
                                    <input class="form-control" type="text" id="vehicle_number" name="vehicle_number" required >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="vehicle" class="form-label">@lang('global.transaction.vehicle')</label>
                                    <input class="form-control" type="text" id="vehicle" name="vehicle" required >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="material_id" class="form-label">@lang('global.transaction.type_material')</label>
                                    <select name="material_id" id="type_material" class="form-control">
                                        <option value="">---</option>
                                        {{-- <option value="Cor">Cor</option>
                                        <option value="Super">Super</option> --}}
                                        @foreach ($materials as $material)
                                            <option value="{{$material->id}}">{{$material->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="price_material" class="form-label">@lang('global.transaction.price_material')</label>
                                    <input class="form-control price" type="text" id="price_material" name="price_material" required >
                                </div>
                            </div>
                            {{-- <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="nomor" class="form-label">@lang('global.transaction.nomor')</label> --}}
                                    <input class="form-control" type="hidden" id="nomor" name="nomor"  >
                                {{-- </div>
                            </div> --}}
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="gosek" class="form-label">@lang('global.transaction.gosek')</label>
                                    <input class="form-control price" type="text" id="gosek" name="gosek"  >
                                </div>
                            </div>
                        </div>
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
            format : 'DD-MM-YYYY',
            time:false,
        });


        $(document).on('keyup','.price',function(){
            formatRp()
        });


        function formatRp () {
            var amount = $(".price").map(function(index, value){
                var rupiah = parseInt($(value).val() == ''? 0:$(value).val().split('.').join(""))
                    $(value).val(function(index, item) {
                    return item
                    .replace(/\D/g, "")
                    .replace(/\B(?=(\d{3})+(?!\d))/g, ".")
                    ;
                });
            });
        }
    </script>
@endsection
