@extends('admin.template')

@section('content')
    <div class="row">
        <div class="col-xl-9 mx-auto">
            <h6 class="mb-0 text-uppercase">@lang('global.transaction.expense') {{$date}}</h6>
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
                    @can('isCashier')
                        <form action="{{ route('cashier.transaction.expense_store') }}" method="POST">
                        @csrf
                    @endcan
                    <input type="hidden" name="date" value="{{$date}}">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <input type="hidden" name="date" value="{{$date ? $date : date('d-m-Y')}}">
                                <div class="mb-3">
                                    {{-- <label for="date" class="form-label">@lang('global.journal.register')</label> --}}
                                    {{-- <input class="form-control " data-date-format="DD MMMM YYYY" type="text" id="register" name="register" required > --}}
                                    <input class="result form-control" type="text" disabled id="date" value="{{$date ? $date : date('d-m-Y')}}" name="created_at" required>
                                </div>
                            </div>
                            {{-- operator --}}
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="expense" class="form-label">@lang('global.transaction.operator')</label>
                                    <input class="form-control price" type="number" min="0" value="{{isset($expenses[0]) ? $expenses[0]->expense : 0}}" placeholder="0" id="expense" name="expense[]" required >
                                </div>
                            </div>
                            {{-- kasir --}}
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="expense" class="form-label">@lang('global.transaction.cashier')</label>
                                    <input class="form-control price" value="{{isset($expenses[1]) ? $expenses[1]->expense : 0}}" min="0" placeholder="0" id="expense" name="expense[]" required >
                                </div>
                            </div>
                              {{-- helper --}}
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="expense" class="form-label">@lang('global.transaction.helper')</label>
                                    <input class="form-control price" type="text" min="0" value="{{isset($expenses[2]) ? $expenses[2]->expense : 0}}" placeholder="0" id="expense" name="expense[]" required >
                                </div>
                            </div>
                              {{-- road --}}
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="expense" class="form-label">@lang('global.transaction.road')</label>
                                    <input class="form-control price" type="text" min="0" value="{{isset($expenses[3]) ? $expenses[3]->expense : 0}}" placeholder="0" id="expense" name="expense[]" required >
                                </div>
                            </div>
                              {{-- pemilk --}}
                            {{-- <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="expense" class="form-label">@lang('global.transaction.owner')</label>
                                    <input class="form-control price" type="text" min="0" value="{{isset($expenses[5]) ? $expenses[5]->expense : 0}}" placeholder="0" id="expense" name="expense[]" required >
                                </div>
                            </div> --}}
                            <input type="hidden" name="expense[]" value="0" >
                              {{-- road_city --}}
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="expense" class="form-label">@lang('global.transaction.road_city')</label>
                                    <input class="form-control price" type="text" min="0" value="{{isset($expenses[5]) ? $expenses[5]->expense : 0}}" placeholder="0" id="expense" name="expense[]" required >
                                </div>
                            </div>
                            {{-- other --}}
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="expense" class="form-label">@lang('global.transaction.other')</label>
                                    <input class="form-control price" type="text" min="0" value="{{isset($expenses[6]) ? $expenses[6]->expense : 0}}" placeholder="0" id="expense" name="expense[]" required >
                                </div>
                            </div>
                            {{-- solar --}}
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="expense" class="form-label">@lang('global.transaction.solar')</label>
                                    <input class="form-control price" value="{{isset($expenses[7]) ? $expenses[7]->expense : 0}}" type="text" min="0" placeholder="0" id="expense" name="expense[]" required >
                                </div>
                            </div>
                        </div>
                    </div>
                    @can('isCashier')
                            <div>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    @endcan
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
            format : 'DD-MM-YYYY',
            time:false,
        });
        $(document).ready(function(){
            // alert('ja;')
            formatRp();
        })

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
