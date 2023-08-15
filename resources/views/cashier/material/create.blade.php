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
                            <label for="name" class="form-label">@lang('global.material.name')</label>
                            <input class="form-control" type="text" id="name" name="name" required>
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
