<!DOCTYPE html>
<html>

<head>
    <title>Report Jurnal </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 7pt;
        }
    </style>
    <div style="text-align : center">
        <h5>Desa Adat Punggang</h5>
        <h5>Bagi Hasil</h5>
        <h6>{{ $profit_sharing->title }}</h6>
        <h6><a target="_blank" href="{{ url('/') }}">Tanggal
                {{ date('d F Y', strtotime($profit_sharing->created_at)) }} </a></h5>
    </div>
    <table class='table table-bordered'>
        <tbody style="font-size: 7pt">
            <tr>
                <td class="text-center " style="font-weight: bold">Total Penjualan</td>
                <td></td>

                <td></td>
                <td class="text-center" style="font-weight: bold">
                    {{ Rupiah(str_replace('-', '', $profit_sharing->details['incomestatement'])) }} </td>
                <td style="width: 3px"></td>
            </tr>
            <tr>
                <th>Keterangan</th>
                <th>Jumlah</th>
                <th>Persentase</th>
                <th>total</th>
                <th></th>
            </tr>

            @foreach ($profit_sharing->details['share'] as $detail)
                <tr>
                    <td>{{ __("global.profit-sharing.{$detail['name']}") }}</td>
                    <td>{{ $detail['qty'] }}</td>
                    <td>{{ $profit_sharing->details['incomestatement'] == 0 ? 0 : ($detail['value'] / $profit_sharing->details['incomestatement']) * 100 }}%
                    </td>
                    <td>{{ Rupiah(str_replace('-', '', $detail['value'])) }} </td>
                    <td style="width: 3px"></td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
