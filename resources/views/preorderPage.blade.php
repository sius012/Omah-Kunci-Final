@php
$whoactive = "preorderpage";
$master='kasir';
$no=1;
@endphp
@extends('layouts.layout2')
@section('titlepage', 'Transaksi')
@section('title', 'Riwayat Transaksi')




@section('css')
<link rel="stylesheet" href="{{ asset('css/preorderpage.css') }}">

@endsection
@section('js')
<script src="{{ asset('js/transaksi.js') }}"></script>
<script>
    $(document).ready(function(){
        $(".hapustrans").click(function(e){
            e.preventDefault();
            Swal.fire({
            title: 'Apakah anda yakin ingin menghapus',
            showCancelyButton: true,
            confirmButtonText: 'Hapus',
            cancelButtonText: `Hapus`,
          }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
               window.location = $(this).attr('href');
            } else if (result.isDenied) {
             
            }
          });
        })
    });
</script>
@stop
@section('content')
<form action="/caritransaksi" type="get">
    @csrf
<div class="row">
    <form action="{{url('/caripreorder')}}" method="get">
    <div class="col-12">
        <input class="search-box " type="text" placeholder="Ketik Nama Pelanggan" name="nama">
        <button style="border:none; background-color:transparent;"><i class="fas fa-search ml-1 search-icon"></i></button>
    </div>
    </form>
</div>
</form>

<div class="row">
    <h5 class="date">Hari Ini</h5>
</div>

@foreach($data as $datas)
<div class="card datatrans p-3" id_trans="">
    <input type="hidden">
    <table class="table table-borderless text-center">
        <tr class="mb-0">
            <th style="width: 40px; margin-left:9px;">
                <div>No Nota</div>
            </th>
            <th style="width: 200px">
                <div>Telah terima dari</div>
            </th>
            <th style="width: 200px">
                <div>No Telp</div>
            </th>
            <th style="width: 200px">
                <div>Guna Membayar</div>
            </th>
            <th style="width: 200px">
                <div>Sejumlah</div>
            </th>
            <th style="width: 200px">
                <div>DP</div>
            </th>
            <th style="width:170px;">
                <div>Tanggal Transaksi</div>
            </th>
            <th rowspan="2" style="width:120px;">
                <div class="mt-3">@if(auth()->user()->roles[0]['name'] == 'manager')<a href="{{route('hapuspre',['id'=>$datas->id])}}" class="btn btn-danger hapustrans"><i style="" class="fa fa-trash"></i></a>@endif</div>
            </th>
        </tr>
      
        <tr>
            <td style="width: 60px">
                <div>{{$no}}</div>
            </td>
            <td>
                <div>{{$datas->ttd}}</div>
            </td>
            <td>
                <div>{{$datas->telepon}}</div>
            </td>
            <td class="align-items-center justify-content-center">
                <div>{{$datas->gm}}</div>
            </td>
            <td class="align-items-center justify-content-center">
                <div>{{$datas->sejumlah}}</div>
            </td>
            <td class=" align-items-center justify-content-center">
                <div>Rp. {{number_format($datas->us)}}</div>
            </td>
            <td>
                <div>{{date('d M Y' ,strtotime($datas->created_at))}}</div>
            </td>
        </tr>
        @php $no++ @endphp
       
    </table>
</div>
@endforeach
</div>
@endsection
