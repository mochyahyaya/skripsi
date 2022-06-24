@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
          <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-home"></i>
          </span> Laporan
        </h3>
    </div>
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Laporan Bulanan</h4>
          <table class="table table-striped" id="table-users">
            <thead>
              <tr>
                <th> Jumlah Transaksi </th>
                <th> Tanggal Transaksi</th>
                <th> Nama Pet </th>
                <th> Nama Pemilik </th>
                <th> Aksi </th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
    </div>
</div>
@endsection

@push('scripts')
    
@endpush