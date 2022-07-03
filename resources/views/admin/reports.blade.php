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
          <table class="table table-striped" id="table-reports">
            <thead>
              <tr>
                <th> #</th>
                <th> Jumlah Transaksi </th>
                <th> Jenis Transaksi </th>
                <th> Tanggal Transaksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($joins as $value)
              {{-- {{dd(count($value))}} --}}
              @for($i = 0; $i < count($value) ; $i++)
              @php
                $indeks = 1;
              @endphp
              <tr>
                <td>
                  {{$indeks ++}}
                </td>
                <td>{{$value[$i]->price}}</td>
                @if ($value[$i]->service_id == 1)
                  <td><span class="badge badge-success">Grooms</span></td>
                @elseif($value[$i]->service_id == 2)
                  <td><span class="badge badge-danger">Hotels</span></td>
                @else
                  <td><span class="badge badge-info">Breeds</span></td>
                @endif
                <td>{{$value[$i]->created_at}}</td>
              </tr>
              @endfor  
              @endforeach
            </tbody>
            <tfoot>
              <tr><th></th><th></th></tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
</div>
@endsection

@push('scripts')
    <script>
      $(document).ready(function() {
        // var table = $('#table-reports').DataTable();
        // var a = table.column( 0 ).data().sum();
        // console.log(a);
        $('#table-reports').DataTable({
          drawCallback: function () {
            var api = this.api();
            var total = api
                .column( 1 )
                .data()
                .sum();
            var format_total = total + '000';
            $( api.column( 0 ).footer() ).html('Total');
            $( api.column( 1 ).footer() ).html(format_total);
          },
          dom: 'Bfrtip',
          buttons: [{
            extend: 'pdf',
            title: 'Laporan Bulanan Garden Petshop',
            filename: 'laporan_bulanan_garden_petshop'
          }, {
            extend: 'excel',
            title: 'Laporan Bulanan Garden Petshop',
            filename: 'laporan_bulanan_garden_petshop'
          }, {
            extend: 'csv',
            title: 'Laporan Bulanan Garden Petshop',
            filename: 'laporan_bulanan_garden_petshop'
          }, {
            extend: 'print',
            title: 'Laporan Bulanan Garden Petshop',
            filename: 'laporan_bulanan_garden_petshop'
          }], 
        });
      });
    </script>
@endpush