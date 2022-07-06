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
          <div class="dropdown mb-4">
            <button class="btn btn-gradient-primary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Dropdown
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
              @foreach ($arrMonth as $value)
                <button class="dropdown-item" type="button" value="{{$loop->index}}" id="btn-select-month">{{$value}}</button>
              @endforeach
            </div>
          </div>
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
                <td>{{number_format($value[$i]->price,0,".",".")}}</td>
                @if ($value[$i]->service_id == 1)
                  <td><span class="badge badge-success">Grooms</span></td>
                @elseif($value[$i]->service_id == 2)
                  <td><span class="badge badge-danger">Hotels</span></td>
                @else
                  <td><span class="badge badge-info">Breeds</span></td>
                @endif
                <td>{{ \Carbon\Carbon::parse($value[$i]->created_at)->locale('id')->format('d F Y')}}</td>
              </tr>
              @endfor  
              @endforeach
            </tbody>
            <tfoot>
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
</div>
@endsection

@push('scripts')
  <script>
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $(document).ready(function() {
          var table = $('#table-reports').DataTable({
            dom: 'Bfrtip',
            buttons: [{
              extend: 'pdf',
              title: 'Laporan Bulanan Garden Petshop',
              filename:'laporan_bulanan_garden_petshop',
              footer: true
            }, {
              extend: 'excel',
              title: 'Laporan Bulanan Garden Petshop',
              filename:'laporan_bulanan_garden_petshop',
              footer: true
            }, {
              extend: 'csv',
              title: 'Laporan Bulanan Garden Petshop',
              filename: 'laporan_bulanan_garden_petshop',
              footer: true
            }, {
              extend: 'print',
              title: 'Laporan Bulanan Garden Petshop',
              filename: 'laporan_bulanan_garden_petshop',
              footer: true
            }], 
          });
          var arrPrice = table.column(1).data();
          var totalPrice = parseFloat(arrPrice.reduce(function (a, b) { return parseFloat(a) + parseFloat(b); }, 0)).toFixed(3);
          var formatPrice = totalPrice.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",");

          $("#table-reports tfoot").find('td').eq(0).text("Total");
          $("#table-reports tfoot").find('td').eq(1).text(formatPrice);

          $(document).on('click', '#btn-select-month', function (e) {
            var month = $(this).val();
            // console.log(month);
            $.ajax({
                type: "POST",
                url: "{{ route('admin/refMonths') }}",
                data: month,
                success: function (data) {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                    })
                    Toast.fire({
                    icon: data.data.status,
                    title: data.data.messages
                    })
                }, 
                complete: function(response) {
                  var data = response.responseJSON;

                  if (data != null){
                    data = data.joins;
                    len = data.length;
                    console.log(len);
                    if(len > 0){
                      $('#table-reports').DataTable().clear();
                      $('#table-reports').DataTable().destroy();
                      var find = $('#table-reports tbody').find('tr');
                      if (find) {
                          $('#table-reports tbody').empty();
                          $('#table-reports tfoot').empty();
                      }
                      for(var i = 0; i < len; i++ ){
                        var lenS = data[i].length;
                        for(var j = 0; j < lenS; j++ ){
                          var price = data[i][j]['price'];
                          var transaction = data[i][j]['service_id'];
                          var date = data[i][j]['created_at'];
                          var tr_str = "<tr>" +
                                "<td'>" + i + "</td>" +
                                "<td>" + price + "</td>" +
                                "<td>" + transaction + "</td>" +
                                "<td>" + date + "</td>" +
                                "</tr>";
                                $("#table-reports tbody").append(tr_str);
                          var arrPrice = find.column(1).data();
                          var totalPrice = parseFloat(arrPrice.reduce(function (a, b) { return parseFloat(a) + parseFloat(b); }, 0)).toFixed(3);
                          var formatPrice = totalPrice.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",");

                            $("#table-reports tfoot").find('td').eq(0).text("Total");
                            $("#table-reports tfoot").find('td').eq(1).text(formatPrice);
                        }
                      }
                    }
                    find = $('#table-reports table tbody').find('tr');
                    if (find) {
                        $('#table-reports table').DataTable();
                    }
                  }
                }
            });
          });
      });
  </script>
@endpush