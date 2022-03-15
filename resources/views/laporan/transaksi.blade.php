<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @foreach($datas as $i => $dts)
    <table>
        <tr>
            <th>No</th>
            <th>tanggal</th>
            <th>Nama Pelanggan</th>
            <th>Produk</th>
            <th>jumlah</th>
            <th>total</th>
        </tr>
        @for($j=0;$j<(int)$dts['jmltrans'];$j++)
            <tr>
                <td>{{$j+1}}</td>
       @if($j==0)  
                     <td rowspan="{{$dts['jmltrans']}}">{{date("d-M-Y",strtotime($dts['datas']->created_at))}}</td>
                     <td rowspan="{{$dts['jmltrans']}}">{{$dts['datas']->nama_pelanggan}}</td>
       @endif
                <td>{{$dts[$j]->nama_kodetype." ".$dts[$j]->nama_merek." ".$dts[$j]->nama_produk." "}}</td>
                <td>{{$dts[$j]->jumlah}}</td>
                <td>{{Tools::doDisc($dts[$j]->jumlah,$dts[$j]->harga_produk,$dts[$j]->potongan,$dts[$j]->prefix),0,".","."}}</td>
            </tr>
        @endfor
        <tr>
            <td colspan="5">Total</td>
            <td>{{number_format($dts['datas']->subtotal)}}</td>
        </tr>
        <tr>
            <td colspan="5">Diskon</td>
            <td>{{number_format($dts['datas']->diskon)}}</td>
        </tr>
        <tr>
            <td colspan="5">Harga Akhir</td>
            <td>{{number_format($dts['datas']->subtotal - $dts['datas']->diskon)}}</td>
        </tr>
        <tr>
            <td colspan="5">Dibayar</td>
            <td>{{number_format($dts['datas']->bayar)}}</td>
        </tr>
        <tr>
            <td colspan="5">Kembalian</td>
            <td>{{number_format($dts['datas']->bayar - -($dts['datas']->subtotal - $dts['datas']->diskon))}}</td>
        </tr>
    </table>
    @endforeach
</body>
</html>