@extends('admin.template')

@section('content')
    <div class="row">
        <div class="col-xl-9 mx-auto">
            <h6 class="mb-0 text-uppercase">@lang('global.ledger.ledger')</h6>
            <hr>
            <div class="card">
                <div class="card-body">
                   <form action="{{ route('accounting.ledger.store') }}" method="POST">
                    @csrf
                       <div class="row">
                           <div class="col-md-5">
                                <div class="mb-3">
                                    <label for="monthStart" class="form-label">Pilih bulan tahun awal</label>
                                    <input class="form-control" type="month" id="monthStart" name="monthStart" required >
                                </div>
                           </div>
                           <div class="col-md-5">
                            <div class="mb-3">
                                <label for="monthEnd" class="form-label">Pilih bulan tahun Akhir</label>
                                <input class="form-control" type="month" id="monthEnd" name="monthEnd" required >
                            </div>
                       </div>
                        <div class="mb-3">
                            <label for="register" class="form-label">@lang('global.ledger.register')</label>
                            <input class="form-control" type="text" id="date" name="register" required >
                        </div>
                        <div class="mb-3">
                            <label for="title" class="form-label">@lang('global.ledger.title')</label>
                            <input class="form-control" type="text" id="title" name="title" required >
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">@lang('global.ledger.description')</label>
                            <textarea class="form-control" type="text" id="description" name="description" required rows="5"></textarea>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                   </form>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
    {{-- <script type="text/javascript">
        $(document).ready(() =>{
            $('#dateStart').bootstrapMaterialDatePicker({
                format : 'MM/YYYY',
                time:false,
                monthPicker:true,
                year:true
            });
        });
    </script> --}}
@endsection
