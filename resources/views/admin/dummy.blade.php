@extends('layouts.app')

@section('leftTitle')
<h1 class="m-0">Administrasi Pemakai</h1>
@endsection

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                            Tambah
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="tabel-adm-pemakai">
                                <thead>
                                    <tr>
                                        <th>Nama Login</th>
                                        <th>Nama Pegawai</th>
                                        <th>NIP</th>
                                        <th>Role</th>
                                        {{-- <th>Status</th> --}}
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
 
<div class="modal fade" id="modal-default">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="modal-dialog modal-lg">
        <form action="administrasi-pemakai" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title">Tambah Data</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <label for="" class="col-form-label">Username</label>
                            <input type="text" name="username" id="username" class="form-control @error('username') is-invalid @enderror">
                        </div>
                        @error('username')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label for="" class="col-form-label">Password</label>
                            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror">
                        </div>
                        @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label for="" class="col-form-label">Konfirmasi Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control @error('confirm_password') is-invalid @enderror">
                            <span id='message'></span>
                        </div>
                        @error('password_confirmation')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label for="" class="col-form-label">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label for="" class="col-form-label">NIP</label>
                            <select name="nip" id="nip" class="form-control select2bs4">
                                <option value="">Pilih NIP</option>
                                @foreach ($pegawai as $value)
                                    <option value="{{$value->nip}}">{{$value->nip}} - {{$value->nm_pegawai}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label for="" class="col-form-label">Role</label>
                            <select name="roles" id="roles" class="form-control select2bs4">
                                <option value="">Pilih Role</option>
                                @foreach ($roles as $value)  
                                    <option value="{{$value->id}}">{{$value->id}} - {{$value->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    {{-- <div class="row">
                        <div class="col-12">
                            <label for="" class="col-form-label">Tempat</label>
                            <select name="" id="" class="form-control">
                                <option value="">Pilih Tempat</option>
                            </select>
                        </div>
                    </div> --}}

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-primary tambah_pengguna">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>

{{-- Update Modal --}}
<div class="modal fade" id="modal-update">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="modal-dialog modal-lg">
        <form action="" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title">Update Data</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <input type="hidden" id="user_id">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <label for="" class="col-form-label">Username</label>
                            <input type="text" name="username" id="updateUsername" class="form-control @error('username') is-invalid @enderror">
                        </div>
                        @error('username')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <label for="" class="col-form-label">Nama</label>
                            <input type="text" name="nama" id="updateNama" class="form-control @error('nama') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label for="" class="col-form-label">NIP</label>
                            <select name="nip" id="updatenip" class="form-control select2bs4">
                                @foreach ($pegawai as $value)
                                    <option value="{{$value->nip}}">{{$value->nip}} - {{$value->nm_pegawai}}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('nip')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label for="" class="col-form-label">Role</label>
                            <select name="roles" id="updateRoles" class="form-control select2bs4">
                                <option value="">Pilih Role</option>
                                @foreach ($roles as $value)  
                                    <option value="{{$value->id}}">{{$value->id}} - {{$value->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('wewenang')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- <div class="row">
                        <div class="col-12">
                            <label for="" class="col-form-label">Tempat</label>
                            <select name="" id="" class="form-control">
                                <option value="">Pilih Tempat</option>
                            </select>
                        </div>
                    </div> --}}

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-primary btnclose" data-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-primary update_pengguna">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>

{{--Delete Modal--}}
<div class="modal fade" id="delete-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h4>Anda yakin ingin menghapus data ?</h4>
                <input type="hidden" id="deleteing_id">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary hapus_pengguna">Yes</button>
            </div>
        </div>
    </div>
</div>


@endsection
@push('scripts')
<script>

function setInputFilter(textbox, inputFilter, errMsg) {
  ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop", "focusout"].forEach(function(event) {
    textbox.addEventListener(event, function(e) {
      if (inputFilter(this.value)) {
        // Accepted value
        if (["keydown","mousedown","focusout"].indexOf(e.type) >= 0){
          this.classList.remove("input-error");
          this.setCustomValidity("");
        }
        this.oldValue = this.value;
        this.oldSelectionStart = this.selectionStart;
        this.oldSelectionEnd = this.selectionEnd;
      } else if (this.hasOwnProperty("oldValue")) {
        // Rejected value - restore the previous one
        this.classList.add("input-error");
        this.setCustomValidity(errMsg);
        this.reportValidity();
        this.value = this.oldValue;
        this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
      } else {
        // Rejected value - nothing to restore
        this.value = "";
      }
    });
  });
}

setInputFilter(document.getElementById("nip"), function(value) {
  return /^-?\d*$/.test(value); }, "Masukkan harus dalam angka");


  $(document).ready(function(){
    $('#password, #password_confirmation').on('keyup', function () {
    if ($('#password').val() == $('#password_confirmation').val()) {
    $('#message').html('Matching').css('color', 'green');
    } else 
    $('#message').html('Password tidak sama').css('color', 'red');
    });
  });

$(document).ready( function () {
    $('#tabel-adm-pemakai').DataTable();
});

$(document).ready(function () {
    fetch();

    function fetch() {
        $.ajax({
            type: "GET",
            url : 'administrasi-pemakai-fetch',
            dataType :"json",
            success: function (reponse) {
                $('tbody').html("");
                $.each(reponse.users, function (key,item) {
                    $('tbody').append('<tr>\
                            <td>' + item.username + '</td>\
                            <td>' + item.nama + '</td>\
                            <td>' + item.nip + '</td>\
                            <td>' + item.wewenang + '</td>\
                            <td class="text-center"><button type="button" value="' + item.id + '" class="btn btn-warning edit_pengguna btn-sm">Edit</button>\
                        \</tr>');
                })
            }
        });
    }

$(document).on('click', '.tambah_pengguna', function (e) {
        e.preventDefault();

        $(this).text('Progress..');

        $(this).text('Progress....').attr('disabled', 'disabled')
            $('#tabel-adm-pemakai').DataTable().clear();
            $('#tabel-adm-pemakai').DataTable().destroy();
            var find = $('#tabel-adm-pemakai tbody').find('tr');
            if (find) {
                $('#tabel-adm-pemakaitbody').empty();
            }

        var data = {
            'username': $('#username').val(),
            'password': $('#password').val(),
            'nama': $('#nama').val(),
            'nip': $('#nip').val(),
            'wewenang': $('#roles').val(),
        }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: "POST",
        url: "administrasi-pemakai-store",
        data: data,
        dataType: "json",
        success: function (data) {
            if (data != null){
                toast(data)
                }
        },
        complete: function(err){
            if (err.status == 422) { 
                $('#modal-default').modal('show');
            } else {
                fetch();
                $('.tambah_pengguna').text('Simpan').removeAttr('disabled')
                $('#modal-default').modal('hide');
                $('#modal-default').find('input').val('');
            }
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

$(document).on('click', '.edit_pengguna', function (e) {
    e.preventDefault();
    var user_id = $(this).val();
    // alert(user_id);
    $('#modal-update').modal('show');
    $.ajax({
        type: "GET",
        url: "administrasi-pemakai-edit/" + user_id,
        success: function (response) {
            if (response.status == 404) {
                $('#success_message').addClass('alert alert-success');
                $('#success_message').text(response.message);
                $('#modal-update').modal('hide');
            } else {
                // console.log(response.user.username);
                $('#updateUsername').val(response.data.username);
                $('#updateNama').val(response.data.nama);
                $('#updatenip').val(response.data.nip);
                $('#updateRoles').val(response.data.wewenang);
                $('#user_id').val(user_id);
            }
        },
        complete: function(err) {
            fetch();
            $('#modal-default').modal('hide');
        },
        error: function (err) {
            if (err.status == 422) { // when status code is 422, it's a validation issue
                console.log(err.responseJSON);
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
    $('.btnclose').find('input').val('');

});

$(document).on('click', '.update_pengguna', function (e) {
    e.preventDefault();

    $(this).text('Progress....').attr('disabled', 'disabled')
    $('#tabel-adm-pemakai').DataTable().clear();
    $('#tabel-adm-pemakai').DataTable().destroy();
    var find = $('#tabel-adm-pemakai tbody').find('tr');
    if (find) {
        $('#tabel-adm-pemakai tbody').empty();
    }
    var id = $('#user_id').val();
    // alert(id);

    var data = {
        'username': $('#updateUsername').val(),
        'nama': $('#updateNama').val(),
        'nip': $('#updatenip').val(),
        'wewenang': $('#updateRoles').val(),
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: "PUT",
        url: "administrasi-pemakai-update/" + id,
        data: data,
        dataType: "json",
        success: function (data) {
            if (data != null){
                toast(data)
                }
            },
        complete: function(err){
            if (err.status == 422) { 
                $('#modal-update').modal('show');
            } else {
                fetch();
                $('.update_data').text('Simpan').removeAttr('disabled')
                $('#modal-update').modal('hide');
            }
        },
        error: function (err) {
            if (err.status == 422) { // when status code is 422, it's a validation issue
                console.log(err.responseJSON);
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

$(document).on('click', '.deletebtn', function (e) {
        var user_id = $(this).val();
            $('#delete-modal').modal('show');
            $('#deleteing_id').val(user_id);

            e.preventDefault();

            $(this).text('Deleting..');
            var id = $('#deleteing_id').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "DELETE",
                url: "administrasi-role-delete/" + id,
                dataType: "json",
                success: function (response) {
                    console.log(response);
                    if (response.status == 404) {
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                        $('.hapus_pengguna').text('Yes Delete');
                    } else {
                        $('#success_message').html("");
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                        $('.hapus_pengguna').text('Yes Delete');
                        $('#delete-modal').modal('hide');
                        fetch();
                    }
                }
            });
        });
</script>

@endpush
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
                        <button type="submit" class="btn btn-gradient-primary btn-fw update_data">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
      </div>

      {{-- Delete Modal --}}
      <div class="modal fade" id="delete-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h4>Anda yakin ingin menghapus data ?</h4>
                    <input type="hidden" id="deleteing_id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary hapus_data">Yes</button>
                </div>
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
                            <td>' + item.pet_id + '</td>\
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
            url: "grooms-edit/" + grooms_id,
            success: function (response) {
                if (response.status == 404) {
                    $('#success_message').addClass('alert alert-success');
                    $('#success_message').text(response.message);
                    $('#modal-update').modal('hide');
                } else {
                    $('#updatePetName').val(response.grooms.pet_id);
                    $('#updateService').val(response.grooms.service);
                    $('#updateStatus').val(response.grooms.status);
                    $('#grooms_id').val(response.grooms.id);
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

      $(document).on('click', '.update_data', function (e) {
        e.preventDefault();

        $(this).text('Progress....').attr('disabled', 'disabled')
        $('#table-grooms').DataTable().clear();
        $('#table-grooms').DataTable().destroy();
        var find = $('#table-grooms tbody').find('tr');
        if (find) {
            $('#table-grooms tbody').empty();
        }
        var id = $('#grooms_id').val();
        alert(id);

        var data = {
            'petname': $('#updatePetName').val(),
            'service': $('#updateService').val(),
            'status': $('#updateStatus').val(),
        }

        $.ajax({
            type: "PUT",
            url: "grooms-update/" + id,
            data: data,
            dataType: "json",
            success: function (data) {
                console.log('success') 
            },
            complete: function(){
                if (err.status == 422) { 
                    $('#modal-update').modal('show');
                } else {
                    fetch();
                    $('.update_data').text('Simpan').removeAttr('disabled')
                    $('#modal-update').modal('hide');
                }
            },
            error: function (err) {
                if (err.status == 422) { // when status code is 422, it's a validation issue
                    console.log(err.responseJSON);
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

    $(document).on('click', '.hapus_data', function (e) {
            var grooms_id = $(this).val();
            $('#delete-modal').modal('show');
            $('#deleteing_id').val(grooms_id);

            e.preventDefault();

            $(this).text('Deleting..');
            var id = $('#deleteing_id').val();

            $.ajax({
                type: "DELETE",
                url: "grooms-delete/" + id,
                dataType: "json",
                success: function (response) {
                    console.log(response);
                    if (response.status == 404) {
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                        $('.hapus_data').text('Hapus');
                    } else {
                        $('#success_message').html("");
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                        $('.hapus_pengguna').text('Yes Delete');
                        $('#delete-modal').modal('hide');
                        fetch();
                    }
                }
            });
        });
    });
  </script>
@endpush