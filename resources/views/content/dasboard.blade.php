@extends('layout.main')
@section('judul','Dashboard')
@section('content')
<section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>Customer</h3>
              <h2>{{$totalCustomer}}</h2>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>Order</h3>
              <h2>{{$totalOrder}}</h2>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>Status</h3>

              <h2>{{ $totalStatus }}</h2>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>Transaksi</h3>

              <h2>{{ $totalTransaksi }}</h2>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->

    </div>

<!-- Content Row -->
<div class="row">
    <!-- Content Column -->
    <div class="col-lg-12 mb-4">
        <!-- Project Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">List Pemesanan</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>No Telepon</th>
                                <th>Alamat</th>
                                <th>Tanggal Pesanan</th>
                                <th>Jenis Layanan</th>
                                <th>Status Pesanan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach($latestStatus as $row)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $row->nama }}</td>
                                    <td>{{ $row->no_telepon }}</td>
                                    <td>{{ $row->alamat }}</td>
                                    <td>{{ $row->tanggal_pesanan }}</td>
                                    <td>{{ $row->jenis_layanan }}</td>
                                    <td>{{ $row->status_pesanan }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
</div>


@endsection
