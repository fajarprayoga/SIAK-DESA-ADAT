@extends('admin.template')

@section('content')
    {{-- <h1>@lang('global.journal.journal')</h1> --}}
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3 border-right-0">@lang('global.transaction.transaction')</div>
        <div class="ms-auto">
            <div class="btn-group">
                @can('isCashier')
                    <a href="{{ route('cashier.transaction.create') }}" class="text-white btn btn-primary ">@lang('global.app.add')</a>
                @endcan
            </div>
        </div>
    </div>
    {{-- <a href="{{ route('admin.journal.create') }}" class="btn btn-success btn-md my-1">@lang('global.app.add') @lang('global.journal.title')</a> --}}
    <div class="card">
        <div class="card-body">
            <div class="table-responsive mt-3">
                <table class="table align-middle table-bordered  data-table">
                    <thead class="table-secondary">
                        <tr>
                            <th>No</th>
                            <th>@lang('global.transaction.date')</th>
                            {{-- <th>@lang('global.journal.detail')</th> --}}
                            <th width="100px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 0 ?>
                        @foreach ($transactions as $index=> $transaction)
                            <tr>
                                <td>{{$no+=1}}</td>
                                <td>
                                   {{$index }}
                                </td>
                                <td>
                                    <a href="{{route('cashier.transaction.show', $index)}}" class="btn btn-sm btn-info">Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">

    </script>
@endsection
