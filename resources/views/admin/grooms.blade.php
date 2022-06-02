@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
          <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-home"></i>
          </span> Grooming
        </h3>
    </div>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">List Data Grooming</h4>
            <div class="card-description">
                <button type="button" class="btn btn-gradient-primary btn-fw" data-toggle="modal" data-target="#modal-insert">
                    Tambah Data
                  </button>
            </div>
            <table class="table table-striped" id="table-grooms">
              <thead>
                <tr>
                  <th> Nama Pet </th>
                  <th> Jenis Grooming</th>
                  <th> Harga </th>
                  <th> Penjemputan </th>
                  <th> Status </th>
                  <th> Aksi </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($grooms as $value)
                  <tr>
                      <td>{{$value->pets->name}}</td>
                      <td>{{$value->service}}</td>
                      <td>{{$value->price}}</td>
                      <td>{{$value->status}}</td>
                      <td>{{$value->pickup}}</td>
                      <td>
                        <button>Edit</button>
                        <button>Delete</button>
                      </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>

      {{-- Insert Modal --}}
      <div class="modal fade" id="modal-insert">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title">Tambah Data</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="post" class="forms-sample">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group">
                                <label for="username">Nama Pemilik</label>
                                <select id="username" class="form-control select2bs4">
                                    <option value="" selected disabled>--Pilih Nama Pemilik--</option>
                                    @foreach ($users as $value)
                                        <option value="{{$value->id}}">{{$value->name}}</option>
                                    @endforeach
                                </select>
                              </div>
                        </div>
                        <div class="row">
                            <div class="forms-group">
                                <label for="petname" class="col-form-label">Nama Pet</label>
                                <select id="petname" class="form-control select2bs4">
                                  <option value="" selected disabled>--Pilih Nama Pet--</option>
                                  @foreach ($pets as $value)
                                      <option value="{{$value->id}}">{{$value->name}}</option>
                                  @endforeach
                              </select>
                            </div>
                        </div>
                        <div class="row">
                          <div class="forms-group">
                              <label for="service" class="col-form-label">Jenis Grooming</label>
                              <select id="service" class="form-control select2bs4">
                                <option value="" selected disabled>--Pilih Grooming--</option>
                                <option value="Lengkap">Lengkap</option>
                                <option value="Jamur">Jamur</option>
                                <option value="Kutu">Kutu</option>
                            </select>
                          </div>
                      </div>
                      <div>
                        <input type="hidden" name="price" id="price">
                      </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-gradient-light btn-fw" data-dismiss="modal">Kembali</button>
                        <button type="submit" class="btn btn-gradient-primary btn-fw tambah_data">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
  <script>
    $(document).ready( function () {
      $('#table-grooms').DataTable();
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    $(document).ready(function () {
      $(document).on('click', '.tambah_data', function (e) {
        e.preventDefault();

        $(this).text('Progress....').attr('disabled', 'disabled')
        $('#table-grooms').DataTable().clear();
        $('#table-grooms').DataTable().destroy();
        var find = $('#table-grooms tbody').find('tr');
        if (find) {
            $('#table-grooms tbody').empty();
        }

        var price = $('#service').val();
        if(price == 'Lengkap'){
          $('#price').val('50000');
        } else if (price == 'Kutu' ) {
          $('#price').val('40000');
        } else {
          $('#price').val('35000')
        }

        var data = {
            "_token": "{{ csrf_token() }}",
            'petname': $('#petname').val(),
            'service': $('#service').val(),
            'price': $('#price').val(),
            'status': 'Diproses',
            'pickup' : 'Tidak'
        }


    $.ajax({
        type: "POST",
        url: "{{ route('admin/groomsStore') }}",
        data: data,
        dataType: "json",
        success: function (data) {
            if (data != null){
                toast(data)
                }
        },
        complete: function(err){
          fetch();
          $('.tambah_data').text('Simpan').removeAttr('disabled')
          $('#modal-insert').modal('hide');
          $('#modal-insert').find('input').val('');
        },
        error: function (err) {
            if (err.status == 422) { // when status code is 422, it's a validation issue
                // console.log(err.responseJSON);
                $('#success_message').fadeIn().html(err.responseJSON.message);
                
                // you can loop through the errors object and show it to the user
                console.warn(err.responseJSON.errors);
                // display errors on each form field
                $.each(err.responseJSON.errors, function (i, error) {
                    var el = $(document).find('[name="'+i+'"]');
                    el.after($('<span style="color: red;">'+error[0]+'</span>'));
                });
            }
          }
        });
      });
    });
  </script>
@endpush