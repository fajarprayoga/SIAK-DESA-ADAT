<!DOCTYPE html>
<html>
<head>
	<title>Report Jurnal </title>
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
		<h5>CV. GIRI HANOMAN SHANTI</h5>
        <h5>Laba Rugi</h5>
		<h6><a target="_blank" href="{{ url('/') }}">Periode {{date('d F Y', strtotime($incomestatement->register))}} </a></h5>
	</div>
	<table class='table table-bordered'>
		<tbody style="font-size: 7pt">
            <tr>
				<th>Penjualan/Pendapatan</th>
                <th></th>
                <th></th>
                <th style="width: 3px"></th>
			</tr>
            @foreach ($incomestatement->incomestatement_detail as $index=>$detail)
               @if ($detail->type == 'income')
               <tr>
                    <td>{{$detail->name}}</td>
                    <td>{{Rupiah(str_replace("-","",  $detail->amount))}} </td>
                    <td></td>
                    <td style="width: 3px"></td>
                </tr>
               @endif
            @endforeach
            <tr>
                <td class="text-center " style="font-weight: bold">Total Penjualan</td>
                <td></td>
                <td class="text-center" style="font-weight: bold">{{Rupiah(str_replace("-","",  $total->amount_total))}} </td>
                <td style="width: 3px"></td>
            </tr>
            <tr>
				<th>Pengeluaran</th>
                <th></th>
                <th></th>
                <th style="width: 3px"></th>
			</tr>
            @foreach ($incomestatement->incomestatement_detail as $index=>$detail)
            @if ($detail->type == 'expense')
            <tr>
                 <td>{{$detail->name}}</td>
                 <td>{{Rupiah($detail->expense)}}</td>
                 <td></td>
                 <td style="width: 3px"></td>
             </tr>
            @endif
            @endforeach
            <tr>
                <td class="text-center " style="font-weight: bold">Total Pengeluaran</td>
                <td></td>
                <td class="text-center" style="font-weight: bold"> {{Rupiah($total->expense_total)}} </td>
                <td style="width: 3px; font-size: 10px; font-weight: bold">-</td>
            </tr>
            <?php
                // $total_amount = (int)(str_replace("-","",  $total->amount_total)
                if((int)(str_replace("-","",  $total->amount_total) > $total->expense_total)){
                    $text = 'LABA';
                }else if((int)(str_replace("-","",  $total->amount_total) < $total->expense_total)){
                    $text ="RUGI";
                }else{
                    $text = '';
                }
            ?>
            <tr>
                <td class="text-center " style="font-weight: bold; font-size: 15px">{{$text}} </td>
                <td></td>
                <td class="text-center" style="font-weight: bold"> {{Rupiah((int)(str_replace("-","",  $total->amount_total) - $total->expense_total))  }} </td>
                <td style="width: 3px"></td>
            </tr>
		</tbody>
	</table>

</body>
</html>
