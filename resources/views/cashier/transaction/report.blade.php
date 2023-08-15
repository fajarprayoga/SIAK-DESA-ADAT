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
        .transaksi-total{
            font-size: 15px;
        }
	</style>
	<div style="text-align : center">
		<h5>Laporan Transaksi </h4>
		<h6><a target="_blank" href="{{ url('/') }}">Laporan Keuangan </a></h5>
	</div>
    <div style="text-align: right" >
        {{date('d M     Y', strtotime($date))}}
    </div>

    <h4>Debet</h4>
	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>No</th>
				<th>@lang('global.transaction.vehicle_number')</th>
                <th>@lang('global.transaction.vehicle')</th>
                <th>@lang('global.transaction.type_material')</th>
                <th>@lang('global.transaction.nomor')</th>
                <th>@lang('global.transaction.price_material')</th>
			</tr>
		</thead>
		<tbody style="font-size: 7pt">
            <?php $next = 0 ?>
            @foreach ($transactions as $index=> $transaction)
                <?php $next+=1 ?>
                <tr>
                    <td>
                        {{$index + 1}}
                    </td>
                    <td> {{$transaction->vehicle_number}} </td>
                    <td> {{$transaction->vehicle}} </td>
                    <td> {{$transaction->material->name}} </td>
                    <td> {{$transaction->nomor}} </td>
                    <td> {{Rupiah($transaction->price_material)}} </td>
                </tr>
            @endforeach
        <tr style="text-align: center; background-color:  #728FCE; font-weight: bold; color: white; font-size: 30px">
            <td  colspan="4" >Total</td>
            <td></td>
            <td>{{Rupiah($total)}}</td>
        </tr>
		</tbody>
	</table>

    <h4>Kredit</h4>

    {{-- Pengeluaran --}}
    <table class='table table-bordered'>
		<thead>
            <tr>
                <td>
                    No
                </td>
                <td  > Jenis Pengeluaran</td>
                <td  > Pengeluaran</td>
            </tr>
		</thead>
		<tbody style="font-size: 7pt">
            <?php $next = 1 ?>
            <tr>
                <td>
                    {{$next}}
                </td>
                <td > Gosek</td>
                <td > {{Rupiah($gosek)}} </td>
            </tr>
            @foreach ($transactions_expense as $index=> $transaction)
            <tr>
                <td>
                    {{$next+=1}}
                </td>
                <td > {{$transaction->vehicle_number}} </td>
                <td > {{Rupiah($transaction->expense)}} </td>
            </tr>
            @endforeach
        <tr style="text-align: center; background-color: #ce4506; font-weight: bold; color: white; font-size: 30px">
            <td></td>
            <td >Total</td>
            <td>{{Rupiah($total_expense)}}</td>
        </tr>
        {{-- <tr style="text-align: center; background-color: #728FCE; font-weight: bold; color: white; font-size: 30px">
            <td  colspan="4" >Saldo</td>
            <td colspan="2" >{{Rupiah ($total - $total_expense)}}</td>
            <td></td>
        </tr> --}}
		</tbody>
	</table>

    <table>
        <tbody>
            <tr>
                <td class="transaksi-total">Total Debet</td>
                <td class="transaksi-total"> : </td>
                <td class="transaksi-total">{{Rupiah($total)}}</td>
            </tr>
            <tr>
                <td class="transaksi-total">Total Kredit</td>
                <td class="transaksi-total"> : </td>
                <td class="transaksi-total">{{Rupiah($total_expense)}}</td>
            </tr>
            <tr>
                <td class="transaksi-total">Saldo </td>
                <td class="transaksi-total"> : </td>
                <td class="transaksi-total">{{Rupiah ($total - $total_expense)}}</td>
            </tr>
        </tbody>
    </table>

</body>
</html>
