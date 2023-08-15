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
        <h5>JURNAL UMUM</h5>
		<h6><a target="_blank" href="{{ url('/') }}">Periode {{date('d F Y', strtotime($journal->register))}} </a></h5>
	</div>
	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>Tanggal</th>
                <th>Keterangan</th>
                <th>Ref</th>
                <th>Debet</th>
                <th>Kredit</th>
			</tr>
		</thead>
		<tbody style="font-size: 7pt">
            @foreach ($journal->journal_detail as $index=>$detail)
            <tr>
                <td>{{date('d F Y', strtotime($detail->updated_at))}}</td>
                <td>{{$detail->description}}</td>
                <td>{{$detail->account->code}}</td>
                <td>{{$detail->types == 'debit' ? Rupiah($detail->amount) : ''}}</td>
                <td>{{$detail->types == 'credit' ? Rupiah($detail->amount) : ''}}</td>
            </tr>
        @endforeach
		</tbody>
	</table>

</body>
</html>
