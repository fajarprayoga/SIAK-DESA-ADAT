@extends('admin.template')

@section('content')
    <div class="row">
        <div class="col-xl-9 mx-auto">
            <h6 class="mb-0 text-uppercase">@lang('global.account.title')</h6>
            <hr>
            <div class="">
                <div class="card">
                    <div class="card-body">
                       <form action="{{ route('accounting.accounts.store') }}" method="POST">
                        @csrf
                           <div class="">
                                <div class="mb-3">
                                    <label for="code" class="form-label">@lang('global.account.code')</label>
                                    <input class="form-control" type="text" id="code" name="code" required >
                                </div>
                                <div class="mb-3">
                                    <label for="name" class="form-label">@lang('global.account.name')</label>
                                    <input class="form-control" type="text" id="name" name="name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="name" class="form-label">@lang('global.account.normal_balance')</label>
                                    <select class="form-control" name="normal_balance" id="normal_balance">
                                        <option value=""></option>
                                        <option value="debit">Debit</option>
                                        <option value="credit">Kredit</option>
                                    </select>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                           </div>
                       </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
