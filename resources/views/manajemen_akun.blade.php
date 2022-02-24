@php  $whoactive='transaksipreorder' @endphp
@extends('layouts.layout2')
@section('titlepage', 'Transaksi Preorder')



@section('css')
    <link rel="stylesheet" href="{{ asset('css/transaksi.css') }}">
    <link rel="stylesheet" href="{{ asset('css/transaksi_progress_bar.css') }}">
    <script>
      $(document).ready(function(){
        $("#infomodal").modal('show');
      });
    </script>
@endsection

@section('content')
<section class="section">
    <div class="container-fluid">
        
    </div>
</section>
@endsection