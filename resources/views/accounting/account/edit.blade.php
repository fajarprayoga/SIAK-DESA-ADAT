@extends('admin.template')

@section('content')
    <div class="row">
        <div class="col-xl-9 mx-auto">
            <h6 class="mb-0 text-uppercase">@lang('global.account.title')</h6>
            <hr>
            <div class="card">
                <div class="card-body">
                   <form action="{{ route('accounting.accounts.update', $account->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                        <div class="mb-3">
                            <label for="code" class="form-label">@lang('global.account.code')</label>
                            <input class="form-control" type="text" id="code" name="code" required value="{{ old('code', isset($account) ? $account->code : '') }}">
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">@lang('global.account.name')</label>
                            <input class="form-control" type="text" id="name" name="name" required value="{{ old('name', isset($account) ? $account->name : '') }}">
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">@lang('global.account.normal_balance')</label>
                            <select class="form-control" name="normal_balance" id="normal_balance">
                                {{-- <option value=""></option> --}}
                                <option value="debit" {{$account->normal_balance == 'debit' ? 'selected' : ''}}>Debit</option>
                                <option value="credit" {{$account->normal_balance == 'credit' ? 'selected' : ''}}>Kredit</option>
                            </select>
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
