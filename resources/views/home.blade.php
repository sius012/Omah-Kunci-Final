@php $whoactive="";
    $master='home'; @endphp
    @extends('layouts.layout2')

    @section('title', 'Omah Kunci || Dashboard')

    @section('content_header')
    <h1 class="m-0 text-dark"></h1>
    @stop

        @section('content')
        <!-- Main content -->
        <div class="container-fluid">
            <!-- Info boxes -->

            <!-- /.row -->

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header mb-0 bg-primary text-light">
                            <h5 class="card-title mt-2">Laporan harian</h5>
                            <h5 class="card-title float-right mt-2"><b>Hari Ini,
                                    {{ date('d M Y') }}</b></h5>
                        </div>
                        <!-- /.card-header -->

                        <!-- ./card-body -->
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-sm-4 col-6">
                                    <div class="description-block border-right">

                                        <h5 class="description-header">
                                            Rp.{{ number_format($daily['hari']['pemasukan']) }}
                                        </h5>
                                        <span class="description-text">PEMASUKAN HARI INI</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4 col-6">
                                    <div class="description-block border-right">
                                        <h5 class="description-header">Rp.
                                            {{ number_format($daily['minggu']['pemasukan']) }}
                                        </h5>
                                        <span class="description-text">PEMASUKAN MINGGU INI</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4 col-6">
                                    <div class="description-block border-right">
                                        <span class="description-percentage text-success"><i
                                                class="fas fa-caret-up"></i>
                                            20%
                                        </span>
                                        <h5 class="description-header">Rp.
                                            {{ number_format($daily['bulanan']['pemasukan']) }}
                                        </h5>
                                        <span class="description-text">PEMASUKAN BULAN INI</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                            </div>
                        </div>

                        <!-- /.card-header -->

                        <!-- ./card-body -->
                        <div class="card-footer">

                            <!-- /.row -->
                        </div>
                        <!-- /.card-footer -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <div class="col-md-8">
                    <!-- MAP & BOX PANE -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">US-Visitors Report</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <div class="d-md-flex">
                                <div class="p-1 flex-fill" style="overflow: hidden">
                                    <!-- Map will be created here -->
                                    <div id="world-map-markers" style="height: 325px; overflow: hidden">
                                        <div class="map"></div>
                                    </div>
                                </div>
                                <div class="card-pane-right bg-success pt-2 pb-2 pl-4 pr-4">
                                    <div class="description-block mb-4">
                                        <div class="sparkbar pad" data-color="#fff">90,70,90,70,75,80,70</div>
                                        <h5 class="description-header">8390</h5>
                                        <span class="description-text">Visits</span>
                                    </div>
                                    <!-- /.description-block -->
                                    <div class="description-block mb-4">
                                        <div class="sparkbar pad" data-color="#fff">90,50,90,70,61,83,63</div>
                                        <h5 class="description-header">30%</h5>
                                        <span class="description-text">Referrals</span>
                                    </div>
                                    <!-- /.description-block -->
                                    <div class="description-block">
                                        <div class="sparkbar pad" data-color="#fff">90,50,90,70,61,83,63</div>
                                        <h5 class="description-header">70%</h5>
                                        <span class="description-text">Organic</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div><!-- /.card-pane-right -->
                            </div><!-- /.d-md-flex -->
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    <div class="row">
                        <div class="col-md-6">
                            <!-- DIRECT CHAT -->

                        </div>
                        <!-- /.col -->

                        <div class="col-md-6">
                            <!-- USERS LIST -->

                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- TABLE: LATEST ORDERS -->

                </div>
                <!-- /.col -->

                <div class="col-md-4">
                    <!-- Info Boxes Style 2 -->
                    <div class="info-box mb-3 bg-warning">
                        <span class="info-box-icon"><i class="fas fa-archive text-dark"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Gudang</span>
                            <span class="info-box-number">5,200 Produk</span>
                        </div>

                        <span class="info-box-icon"><i
                                class="fa fa-list bg-dark text-warning p-2 rounded-circle"></i></span>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                    <div class="info-box mb-3 bg-light">
                        <span class="info-box-icon"><i class="far fa-user text-dark"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Pengguna</span>
                            <span class="info-box-number">5 Pengguna</span>
                        </div>

                        <span class="info-box-icon"><i class="fa fa-list bg-primary p-2 rounded-circle"></i></span>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                    <div class="info-box mb-3 bg-info">
                        <span class="info-box-icon"><i class="fa fa-inbox"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Kotak Masuk</span>
                            <span class="info-box-number">10 Pesan</span>
                        </div>

                        <span class="info-box-icon"><i
                                class="fa fa-list bg-light text-info p-2 rounded-circle"></i></span>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->



                    <!-- PRODUCT LIST -->

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!--/. container-fluid -->
        <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        </section>
        @stop
