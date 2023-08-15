<!DOCTYPE html>
<html>
<head>
	<title>Report Transaksi </title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 7pt;
		}
	</style>
	<div style="text-align : center">
		<h5>Laporan Transaksi </h4>
		<h6><a target="_blank" href="{{ url('/') }}">Laporan Keuangan </a></h5>
	</div>
    <div style="text-align: right" >
        {{date('d M     Y', strtotime($date))}}
    </div>
	<table class='table table-bordered'>
		<thead>
			<tr>
				<td>No</td>
				<td>@lang('global.transaction.vehicle_number')</td>
                <td>@lang('global.transaction.vehicle')</td>
                <td>@lang('global.transaction.type_material')</td>
                <td>@lang('global.transaction.price_material')</td>
                <td>@lang('global.transaction.expense')</td>
                <td>@lang('global.transaction.nomor')</td>
			</tr>
		</thead>
		<tbody style="font-size: 7pt">
            <?php $next = 1 ?>
            @foreach ($transactions as $index=> $transaction)
                <tr>
                    <td>
                        {{$index + 1}}
                    </td>
                    <td> {{$transaction->vehicle_number}} </td>
                    <td> {{$transaction->vehicle}} </td>
                    <td> {{$transaction->material->name}} </td>
                    <td> {{Rupiah($transaction->price_material)}} </td>
                    <td>  </td>
                    <td> {{$transaction->nomor}} </td>
                </tr>
            @endforeach
            {{-- Pengeluaran --}}
            <tr><td colspan="7"></td></tr>
            <tr>
                <td>
                    No
                </td>
                <td colspan="4" > Jenis Pengeluaran</td>
                <td colspan="2" > Pengeluaran</td>
            </tr>
            <tr>
                <td>
                    {{$next}}
                </td>
                <td colspan="4"> Gosek</td>
                <td colspan="2"> {{Rupiah($gosek)}} </td>
            </tr>
            @foreach ($transactions_expense as $index=> $transaction)
            <tr>
                <td>
                    {{$next+=1}}
                </td>
                <td colspan="4"> {{$transaction->vehicle_number}} </td>
                <td colspan="2"> {{Rupiah($transaction->expense)}} </td>
            </tr>
        @endforeach
        <tr style="text-align: center; background-color: #B6B6B4; font-weight: bold; color: white; font-size: 30px">
            <td  colspan="4" >Total</td>
            <td>{{Rupiah($total)}}</td>
            <td>{{Rupiah($total_expense)}}</td>
            <td></td>
        </tr>
        <tr style="text-align: center; background-color: #728FCE; font-weight: bold; color: white; font-size: 30px">
            <td  colspan="4" >Saldo</td>
            <td colspan="2" >{{Rupiah ($total - $total_expense)}}</td>
            <td></td>
        </tr>
		</tbody>
	</table>

</body>
</html>
