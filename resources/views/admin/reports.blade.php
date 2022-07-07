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
                <td>{{ \Carbon\Carbon::parse($value[$i]->created_at)->locale('id')->isoFormat('Do MMMM YYYY')}}</td>
              </tr>
              @endfor  
              @endforeach
            </tbody>
            <tfoot>
              <tr>
                  <th colspan="1">Total:</th>
                  <th colspan="3"></th>
              </tr>
              {{-- <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr> --}}
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
        "footerCallback": function ( row, data, start, end, display ) {
          var api = this.api(), data;

          // Remove the formatting to get integer data for summation
          var intVal = function ( i ) {
              return typeof i === 'string' ?
                  i.replace(/[\$,]/g, '')*1 :
                  typeof i === 'number' ?
                      i : 0;
          };

          // Total over all pages
          total = api
              .column(1)
              .data();

          console.log(total);
          
          var totalPrice = parseFloat(total.reduce(function (a, b) { return parseFloat(a) + parseFloat(b); }, 0)).toFixed(3);
          var formatPrice = totalPrice.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",");
          // Update footer
          $( api.column( 1 ).footer() ).html(
              'Rp'+ formatPrice 
          );
        },
        destroy: true,
        processing: true,
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
          // var arrPrice = table.column(1, {page:'current'}).data();
          // var totalPrice = parseFloat(arrPrice.reduce(function (a, b) { return parseFloat(a) + parseFloat(b); }, 0)).toFixed(3);
          // var formatPrice = totalPrice.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",");

          // $("#table-reports tfoot").find('td').eq(0).text("Total");
          // $("#table-reports tfoot").find('td').eq(1).text(formatPrice);

        $(document).on('click', '#btn-select-month', function (e) {
          e.preventDefault();
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
            complete: function(response){
              var data = response.responseJSON;

              if (data != null){
                data = data.joins;
                len = data.length;
                // console.log(len);
                if(len > 0){
                  $('#table-reports table tbody').DataTable().clear();
                  $('#table-reports table tbody').DataTable().destroy();
                  var find = $('#table-reports tbody').find('tr');
                  if (find) {
                      $('#table-reports tbody').empty();
                      // $('#table-reports tfoot').empty();
                  }
                  for(var i = 0; i < len; i++ ){
                    var lenS = data[i].length;
                    for(var j = 0; j < lenS; j++ ){
                      var price = data[i][j]['price'];
                      var transaction = data[i][j]['service_id'];
                      var date = data[i][j]['created_at'];
                      var totalPrice = parseFloat(price.reduce(function (a, b) { return parseFloat(a) + parseFloat(b); }, 0)).toFixed(3);
                      var tr_str = "<tr>" +
                            "<td>" + j + "</td>" +
                            "<td>" + totalPrice + "</td>" +
                            "<td>" + transaction + "</td>" +
                            "<td>" + moment(date).locale('id').format('LL') + "</td>" +
                            "</tr>";
                            $("#table-reports tbody").append(tr_str);
                      }
                    }
                    var table = $("#table-reports").DataTable();
                    // var total = table.column(1);
                    // console.log(find);
                    // $("#table-reports tfoot").find('th').eq(0).text("Total");
                    // $("#table-reports tfoot").find('th').eq(1).text(total);
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