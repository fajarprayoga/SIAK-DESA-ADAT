@extends('admin.template')

@section('content')
    <div class="row">
        <div class="col-xl-9 mx-auto">
            <h6 class="mb-0 text-uppercase">@lang('global.trialbalance.trialbalance')</h6>
            <hr>
            <div class="card">
                <div class="card-body">
                   <form action="{{ route('accounting.trialbalance.store') }}" method="POST">
                    @csrf
                    {{-- {{dd($ledgers[0]->title)}} --}}
                        <div class="mb-3">
                            <label for="">Pilih Buku Besar</label>
                            <select  name="ledger_id" class="select2 w-100"  required>
                                <option value="">-- pilih --</option>
                                @foreach ($ledgers as $ledger)
                                    <option value="{{$ledger->id}}">{{$ledger->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="register" class="form-label">@lang('global.trialbalance.register')</label>
                            <input class="form-control" type="text" id="date" name="register" required >
                        </div>
                        <div class="mb-3">
                            <label for="title" class="form-label">@lang('global.trialbalance.title')</label>
                            <input class="form-control" type="text" id="title" name="title" required >
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">@lang('global.trialbalance.description')</label>
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
    <script type="text/javascript">
        // $(document).ready(() =>{
            $('#date').bootstrapMaterialDatePicker({
                format : 'DD-MM-YYYY',
                time:false,
                monthPicker:true,
                year:true
            });
        // });
    </script>
@endsection
