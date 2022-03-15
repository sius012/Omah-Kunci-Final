@php $whoactive = "" ;
    $master = "manager";
    $no=1;
@endphp


@extends('layouts.layout2')

@section('title', 'Manajement akun')
@section('pagetitle', 'Manajement akun')

@section('css')
<link rel="stylesheet" href="{{ asset('css/manajemen_akun.css') }}">
<link rel="stylesheet" href="{{ asset('css/open_sans.css') }}">
<script src="{{ asset('js/akun.js') }}"></script>
@stop
    @php$no = 1; @endphp

        @section('content')
        <section class="content">
            <div class="container-fluid">
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <h2 class="card-title">Manajemen Akun</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-4">
                <div class="card">
                    <table class="table table-striped table-borderless">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th>Nama</th>
                                <th>email</th>
                                <th>role</th>
                                <th>password</th>
                                <th style="width:140px;">aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($akun as $akuns)
                                <form class="updaterole"
                                    action="{{ route('updateakun',['id'=>$akuns->id]) }}"
                                    method='post'>
                                    @csrf
                                    <tr>
                                        <td class="text-center">{{ $no }}</td>
                                        <td>{{ $akuns->name }}</td>
                                        <td>{{ $akuns->email }}</td>
                                        <td><select name="roleid" id="" @if(auth()->user()->id == $akuns->id)
                                                @endif class="custom-select">
                                                <option value="1" @if($akuns->rolename=='manager') selected @endif
                                                    >Manager</option>
                                                <option value="2" @if($akuns->rolename=='admin gudang') selected
                            @endif>Admin Gudang</option>
                            <option value="3" @if($akuns->rolename=='kasir') selected
    @endif>Kasir</option>
    </select></td>
    <td>

        <div class="input-group">

            <input type="password" name="sandi" class="form-control" id="validationServerUsername"
                placeholder="Password Baru" aria-describedby="inputGroupPrepend3" >
            <div class="input-group-prepend">
                <span class="input-group-text btnshow" id="inputGroupPrepend3" c><i class="fa fa-eye-slash"></i></span>
            </div>
        </div>

    </td>
    <td type="submit" class="d-flex align-items-center justify-content-center mb-0"><button type="submit"
            class="mr-1 btn btn-primary p-1 px-2"><i class="fa fa-check p-0"></i></button>
        </form> @if($akuns->id
        != auth()->user()->id)<button class="btn btn-danger p-1 px-2"><a
                href="{{ route('hapusakun',['id'=>$akuns->id]) }}"
                class="text-light"><i class="fa fa-trash"></i></a></button>@endif
    </td>
    </tr>
    </form>
    @php$no++ @endphp
    @endforeach
    </tbody>
    </table>
    </div>
    </div>
    </div>
    </section>
    @stop
