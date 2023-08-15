<!DOCTYPE html>
<html>
<head>
	<title>Report Neraca Saldo </title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 7pt;
		}
        table .date {
            width: 70px;
        }
        table .description {
            width: 200px
        }
        table .ref {
            width: 30px
        }
	</style>
	<div style="text-align : center">
		<h5>CV. GIRI HANOMAN SHANTI</h5>
        <h5>Neraca Saldo</h5>
		<h6><a target="_blank" href="{{ url('/') }}">Periode {{date('d F Y', strtotime($trial_balance->register))}} </a></h5>

	</div>
    <table class='table table-bordered'>
        <thead>
            <tr>
                <th class="date">No Akun</th>
                <th class="description">Nama Akun</th>
                <th class="ref">Ref</th>
                <th class="types">Debet</th>
                <th class="types">Kredit</th>
            </tr>
        </thead>
        {{-- {{dd($trial_balance)}} --}}
        <tbody style="font-size: 7pt">
                <?php
                    $sum_debit = 0;
                    $sum_credit = 0;
                ?>
                @foreach ($trial_balance->trial_balance_detail as $value)
                    <?php $sum_debit += $value->account->normal_balance == 'debit' ? $value->amount : 0 ?>
                    <?php $sum_credit += $value->account->normal_balance == 'credit' ? $value->amount : 0 ?>
                    <tr>
                        <td class="date"> {{$value->account->code}}</td>
                         <td class="description">{{$value->account->name}}</td>
                        <td class="ref"> </td>
                        <td class="types">{{$value->account->normal_balance == 'debit' ? Rupiah($value->amount) : ''}}</td>
                        <td class="types">{{$value->account->normal_balance == 'credit' ? Rupiah(str_replace("-","",  $value->amount)) : ''}}</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="3" class="text-center" style="font-weight: bold; font-size:15px">TOTAL</td>
                    <td class="text-center" style="font-weight: bold; font-size:15px">
                        {{Rupiah($sum_debit)}}
                    </td>
                    <td class="text-center" style="font-weight: bold; font-size:15px">
                        {{Rupiah(str_replace("-","",  $sum_credit))}}
                    </td>
                </tr>
        </tbody>
    </table>
</body>
</html>
