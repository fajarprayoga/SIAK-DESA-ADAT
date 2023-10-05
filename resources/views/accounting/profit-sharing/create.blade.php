@extends('admin.template')
@inject('carbon', 'Carbon\Carbon')
@section('content')
    <div class="row">
        <div class="col-xl-9 mx-auto">
            <h6 class="mb-0 text-uppercase">@lang('global.profit-sharing.profit-sharing')</h6>
            <hr>
            <div class="card">
                <div class="card-body">
                   <form action="{{ route('accounting.profit-sharing.store') }}" method="POST">
                    @csrf
                        <div class="mb-3">
                            <label for="">Pilih Rugi Laba </label>
                            <select  name="incomestatement_id" class="select2 w-100"  required>
                                <option value="">-- pilih --</option>
                                @foreach ($incomestatements as $incomestatement)
                                    <option value="{{$incomestatement->id}}">{{$incomestatement->title."-".$carbon::parse($incomestatement->register)->format("d-m-Y")}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="title">Judul</label>
                            <input class="form-control" type="text" name="title" id="title">
                        </div>
                        <div class="mb-3">
                            <label for="descriptions" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="descriptions" name="descriptions" ></textarea>
                        </div>
                        {{-- <div class="mb-3">
                            <label for="piece_sand_super" class="form-label">@lang('global.incomestatement.piece_sand_super')</label>
                            <input class="form-control price" type="text" id="piece_sand_super" name="amount[]" >
                        </div>
                        <div class="mb-3">
                            <label for="piece_sand" class="form-label">@lang('global.incomestatement.piece_sand')</label>
                            <input class="form-control price" type="text" id="piece_sand" name="amount[]" >
                        </div>
                        <div class="mb-3">
                            <label for="piece_stone" class="form-label">@lang('global.incomestatement.piece_stone')</label>
                            <input class="form-control price" type="text" id="piece_stone" name="amount[]" >
                        </div>
                        <div class="mb-3">
                            <label for="sale_freight_price" class="form-label">@lang('global.incomestatement.sale_freight_price')</label>
                            <input class="form-control price" type="text" id="sale_freight_price" name="amount[]" >
                        </div> --}}
                        <button class="btn btn-primary" type="submit">Tambah</button>
                   </form>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
    {{-- <script type="text/javascript">
        // $(document).ready(() =>{
            $('#date').bootstrapMaterialDatePicker({
                format : 'DD-MM-YYYY',
                time:false,
                monthPicker:true,
                year:true
            });


            $(document).on('keyup','.price',function(){
                // getTotal();
                // alert('jalo')
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
        // });
    </script> --}}
@endsection
