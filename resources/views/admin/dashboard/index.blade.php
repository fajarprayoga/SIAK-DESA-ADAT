@extends('admin.template')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex align-items-center justify-content-center">
                <h3>Desa Adat Punggang</h3>
            </div>


            <div class="col-12 row">

                <div class="col-12 col-lg-8">
                    <div class="card shadow-sm border-0 overflow-hidden">
                        <div class="card-body">
                            <div class="profile-avatar text-center">
                                <h4 style="text-transform: capitalize;" class="mt-4"> Transaksi Hari Ini</h4>
                                <hr>
                            </div>
                            <div class=" mt-4">
                                <h4 class="mb-1">Transaksi</h4>
                                <div class="table-responsive mt-3">
                                    <table class="table align-middle table-bordered  data-table">
                                        <thead class="table-secondary">
                                            <tr>
                                                <th>No</th>
                                                <th>@lang('global.transaction.nomor')</th>
                                                <th>@lang('global.transaction.name_property')</th>
                                                <th>@lang('global.transaction.cost_of_goods')</th>
                                                <th>@lang('global.transaction.price_material')</th>
                                                <th>@lang('global.transaction.quantity')</th>
                                                <th>@lang('global.transaction.discount')</th>
                                                <th>@lang('global.transaction.total')</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($transactions as $index => $item)
                                                <tr>
                                                    <td> {{ $index + 1 }} </td>
                                                    <td> {{ $item->nomor }} </td>
                                                    <td> {{ $item->material?->name }} </td>
                                                    <td> {{ Rupiah($item->cost_of_goods) }} </td>
                                                    <td> {{ Rupiah($item->price_material) }} </td>
                                                    <td> {{ $item->quantity }} </td>
                                                    <td> {{ $item->discount }}% </td>
                                                    <td> {{ Rupiah($item->total) }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>


                <div class="col-12 col-lg-4">
                    <div class="card shadow-sm border-0 overflow-hidden">
                        <div class="card-body">
                            <div class="profile-avatar text-center">
                                <h4 style="text-transform: capitalize;" class="mt-4"> {{ Auth::user()->name }} </h4>
                                <hr>
                            </div>
                            <div class=" mt-4">
                                <h4 class="mb-1">About</h4>
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center bg-transparent border-top">
                                    Email
                                    <span class="rounded-pill"> {{ Auth::user()->email }} </span>
                                </li>
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center bg-transparent border-top">
                                    Role
                                    <span class="badge bg-primary rounded-pill"> {{ Auth::user()->role }} </span>
                                </li>
                            </div>
                            <hr>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    @endsection
