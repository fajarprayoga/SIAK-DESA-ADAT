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
        <h5>Buku Besar</h5>
		<h6><a target="_blank" href="{{ url('/') }}">Periode {{date('d F Y', strtotime($ledger->register))}} </a></h5>
	</div>
    @foreach ($accountId as $index=>$account)

        <h6 class="text-right" >Akun {{$account[0]->account->code}}</h6>
        <table class='table table-bordered'>
            <thead>
                <tr>
                    <th class="date">Tanggal</th>
                    <th class="description">Keterangan</th>
                    <th class="ref">Ref</th>
                    <th class="types">Debet</th>
                    <th class="types">Kredit</th>
                </tr>
            </thead>
            <tbody style="font-size: 7pt">
                    @foreach ($account as $value)
                        <tr>
                            <td class="date"> {{$value->date}}</td>
                            <td class="description">{{$value->account->name}}</td>
                            <td class="ref"> {{$value->account->code}}</td>
                            <td class="types">{{$value->types == 'debit' ? Rupiah($value->amount) : ''}}</td>
                            <td class="types">{{$value->types == 'credit' ? Rupiah($value->amount) : ''}}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="3" ></td>
                        <td>
                            <?php $total_debet = 0; ?>
                            @foreach ($account as $item)
                                @if ($item->types == 'debit')
                                    <?php $type ='debit' ?>
                                    <?php $total_debet += $item->amount; ?>
                                @endif
                            @endforeach

                            {{Rupiah($total_debet)}}
                        </td>
                        <td>
                            <?php $total_credit = 0; ?>
                            @foreach ($account as $item)
                                @if ($item->types == 'credit')
                                <?php $type ='credit' ?>
                                    <?php $total_credit += $item->amount; ?>
                                @endif
                            @endforeach

                            {{Rupiah($total_credit)}}
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" class="text-center" style="font-weight: bold; font-size:15px">TOTAL</td>
                        <?php
                            if ($type == 'debit') {
                                $total_all = $total_debet - $total_credit;
                            }else{
                                $total_all = $total_credit-$total_debet ;
                            }
                        ?>
                        <td colspan="2"  class="text-center" style="font-weight: bold; font-size:15px">{{Rupiah($total_all)}}</td>
                    </tr>
            </tbody>
        </table>
    @endforeach

</body>
</html>
