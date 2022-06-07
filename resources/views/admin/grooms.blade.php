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
                            <div class="forms-group">
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
                                <select id="petname" class="form-control select2bs4" name="petname">
                                  <option value="" selected disabled>--Pilih Nama Pet--</option>
                                  {{-- @foreach ($pets as $value)
                                      <option value="{{$value->id}}">{{$value->name}}</option>
                                  @endforeach --}}
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

      {{-- Update Modal --}}
      <div class="modal fade" id="modal-update">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title">Ubah Data</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="" class="forms-sample">
                    @csrf
                    <div class="modal-body">
                      <input type="hidden" id="grooms_id">
                        <div class="row">
                            <div class="forms-group">
                                <label for="petname" class="col-form-label">Nama Pet</label>
                                <select id="updatePetName" class="form-control select2bs4" name="updatePetName">
                                  @foreach ($pets as $value)
                                      <option value="{{$value->id}}">{{$value->name}}</option>
                                  @endforeach
                              </select>
                            </div>
                        </div>
                        <div class="row">
                          <div class="forms-group">
                              <label for="service" class="col-form-label">Jenis Grooming</label>
                              <select id="updateService" class="form-control select2bs4">
                                <option value="Lengkap">Lengkap</option>
                                <option value="Jamur">Jamur</option>
                                <option value="Kutu">Kutu</option>
                            </select>
                          </div>
                      </div>
                        <div class="row">
                          <div class="forms-group">
                              <label for="status" class="col-form-label">Status</label>
                              <select id="updateStatus" class="form-control select2bs4">
                                <option value="Proses">Proses</option>
                                <option value="Selesai">Selesai</option>
                            </select>
                          </div>
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
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $(document).ready( function () {
      $('#table-grooms').DataTable();
    });

    $(document).ready(function () {
      fetch();
      function fetch() {
        $.ajax({
            type: "GET",
            url : "{{route('admin/groomsFetch')}}",
            dataType :"json",
            success: function (reponse) {
                $('tbody').html("");
                $.each(reponse.grooms, function (key,item) {
                    $('tbody').append('<tr>\
                            <td>' + item.pets.petname + '</td>\
                            <td>' + item.service + '</td>\
                            <td>' + item.price + '</td>\
                            <td>' + item.pickup + '</td>\
                            <td>' + item.status+ '</td>\
                            <td class="text-center"><button type="button" value="' + item.id + '" class="btn btn-gradient-info btn-rounded btn-sm edit_data">Edit</button>\
                            <td class="text-center"><button type="button" value="' + item.id + '" class="btn btn-gradient-danger btn-rounded btn-sm hapus_data">Hapus</button>\
                            </td>\
                        \</tr>');
                })
            }
        });
      }

      $(document).on('change', "#username", function(e) {
        $('select[name="petname"]').attr('disabled','disabled').find('option:nth-of-type(n+2)').remove()
        var user = $(e.target).find(':selected').val();
        $.ajax({
            type:'POST',
            url:"{{ route('admin/refPets') }}",
            data:{user},
            success:function(data){
                console.log(data);
            },
            complete:function(e){
                data = e.responseJSON.data;
                console.log(data);
                $.each(data,function (j,data){
                    $('select[name="petname"]').append($('<option>', { 
                        value: data['id'],
                        text : data['id']+' - '+ data['name'] 
                    }));
                });
                $('select[name="petname"]').removeAttr('disabled')
            }
        })
      });

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
              $('#modal-insert').modal('hide');
              $('#modal-insert').find(':selected').val('');
            },
            complete: function(err){
              $('.tambah_data').text('Simpan').removeAttr('disabled')
              fetch();
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

      $(document).on('click', '.edit_data', function (e) {
        e.preventDefault();
        var grooms_id = $(this).val();
        // alert(user_id);
        $('#modal-update').modal('show');
        $.ajax({
            type: "GET",
            url: "{{ route('admin/groomsEdit') }}" + '/' + id,
            success: function (response) {
                if (response.status == 404) {
                    $('#success_message').addClass('alert alert-success');
                    $('#success_message').text(response.message);
                    $('#modal-update').modal('hide');
                } else {
                    $('#updatePetName').val(response.data.petname);
                    $('#updateService').val(response.data.service);
                    $('#updateStatus').val(response.data.status);
                    $('#grooms_id').val(grooms_id);
                }
            },
            complete: function(err) {
                fetch();
                $('#modal-update').modal('hide');
            },
            error: function (err) {
                if (err.status == 422) {
                    console.log(err.responseJSON);
                    $('#success_message').fadeIn().html(err.responseJSON.message);
                    
                    console.warn(err.responseJSON.errors);
                    $.each(err.responseJSON.errors, function (i, error) {
                        var el = $(document).find('[name="'+i+'"]');
                        el.after($('<span style="color: red;">'+error[0]+'</span>'));
                    });
                }
            }
          });
        $('.btnclose').find('input').val('');
      });
    });
  </script>
@endpush