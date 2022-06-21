@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
          <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-home"></i>
          </span> Pengguna
        </h3>
    </div>
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">List Data Pengguna</h4>
          <div class="card-description">
              <button type="button" class="btn btn-gradient-primary btn-fw" data-toggle="modal" data-target="#modal-create">
                  Tambah Data
                </button>
          </div>
          <table class="table table-striped" id="table-users">
            <thead>
              <tr>
                <th> Nama Pengguna </th>
                <th> Email</th>
                <th> Alamat </th>
                <th> Nomor HP </th>
                <th> Role </th>
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

{{-- Insert Modal --}}
<div class="modal fade" id="modal-create">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Tambah Data</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="" class="forms-sample">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="forms-group">
                            <label for="name">Nama Pengguna</label>
                            <input type="text" name="name" id="name" class="form-control">
                          </div>
                    </div>
                    <div class="row">
                        <input type="hidden" name="password" id="password">
                    </div>
                    <div class="row">
                        <div class="forms-group">
                            <label for="email" class="col-form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="forms-group">
                            <label for="address" class="col-form-label">Alamat</label>
                            <input type="text" name="address" id="address" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="forms-group">
                            <label for="phone_number" class="col-form-label">Nomor HP</label>
                            <input type="text" name="phone_number" id="phone_number" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                      <div class="forms-group">
                          <label for="roles" class="col-form-label">Pilih Role</label>
                          <select id="roles" name="roles" id="roles" class="form-control select2bs4">
                            <option value="" selected disabled>--Pilih Role--</option>
                            @foreach ($roles as $value)
                                <option value="{{$value->id}}">{{$value->name}}</option>
                            @endforeach
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
                  <input type="hidden" id="users_id">
                    <div class="row">
                        <div class="forms-group">
                            <label for="name" class="col-form-label">Nama Pengguna</label>
                            <input type="text" name="updateName" id="updateName" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="forms-group">
                            <label for="email" class="col-form-label">Email</label>
                            <input type="email" name="updateEmail" id="updateEmail" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="forms-group">
                            <label for="address" class="col-form-label">Alamat</label>
                            <input type="text" name="updateAddress" id="updateAddress" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="forms-group">
                            <label for="phone_number" class="col-form-label">Nomor HP</label>
                            <input type="text" name="updatePhoneNumber" id="updatePhoneNumber" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                      <div class="forms-group">
                          <label for="role" class="col-form-label">Role</label>
                          <select id="updateRole" class="form-control select2bs4">
                            @foreach ($roles as $value)
                                <option value="{{$value->id}}" selected>{{$value->name}}</option>
                            @endforeach
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
@endsection

@push('scripts')
    <script>
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $(document).ready(function () {
        fetch();

        function fetch() {
            $.ajax({
                type: "GET",
                url : "{{route('admin/usersFetch')}}",
                dataType :"json",
                success: function (reponse) {
                    $('tbody').html("");
                    $.each(reponse.users, function (key,item) {
                        $('tbody').append('<tr>\
                            <td>' + item.name + '</td>\
                            <td>' + item.email + '</td>\
                            <td>' + item.address + '</td>\
                            <td>' + item.phone_number + '</td>\
                            <td>' + item.roles.name+ '</td>\
                            <td class="text-center"><button type="button" value="' + item.id + '" class="btn btn-gradient-info btn-rounded btn-sm edit_data">Edit</button>\
                                <button type="button" value="' + item.id + '" class="btn btn-gradient-danger btn-rounded btn-sm hapus_data">Hapus</button>\
                            </td>\
                        \</tr>');
                    });
                    $('#table-users').DataTable();
                }
            });
        }

        $(document).on('click', '.tambah_data', function (e) {
            e.preventDefault();

            $(this).text('Progress....').attr('disabled', 'disabled')
            $('#table-grooms').DataTable().clear();
            $('#table-grooms').DataTable().destroy();
            var find = $('#table-grooms tbody').find('tr');
            if (find) {
                $('#table-grooms tbody').empty();
            }

            var data = {
                'name': $('#name').val(),
                'email': $('#email').val(),
                'password': 'gardenpet',
                'address': $('#address').val(),
                'phone_number' : $('#phone_number').val(),
                'role_id': $('#roles').val(),
            }

            $.ajax({
                type: "POST",
                url: "{{ route('admin/usersStore') }}",
                data: data,
                dataType: "json",
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
                    icon: data.status,
                    title: data.message
                    })
                    $('#modal-create').find('input').val('');
                },
                complete: function(){
                    $("#modal-create .close").click();
                    $('.tambah_data').text('Simpan').removeAttr('disabled');
                    fetch();
                },
                error: function (err) {
                if (err.status == 422) {
                    $.each(err.responseJSON.errors, function (i, error) {
                        var el = $(document).find('[name="'+i+'"]');
                        el.after($('<span style="color: red;">'+error[0]+'</span>'));
                    });
                    $('.tambah_data').text('Simpan').removeAttr('disabled')
                }
                }
            });
        });

        $(document).on('click', '.add_data', function (e) {
            $("#modal-create").modal('show');
        })

        $(document).on('click', '.edit_data', function (e) {
            e.preventDefault();
            var users_id = $(this).val();
            console.log(users_id);
            $('#modal-update').modal('show');
            $.ajax({
                type: "GET",
                url: "users-edit/" + users_id,
                success: function (response) {
                if (response != null){
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
                    icon: response.status,
                    title: response.message
                    })
                        $('#updateName').val(response.users.name);
                        $('#updateEmail').val(response.users.email);
                        $('#updatePhoneNumber').val(response.users.phone_number);
                        $('#updateAddress').val(response.users.address);
                        $('#updateRole').val(response.users.role_id);
                        $('#users_id').val(response.users.id);
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
        });

        $(document).on('click', '.update_data', function (e) {
            e.preventDefault();

            $(this).text('Progress....').attr('disabled', 'disabled')
            $('#table-users').DataTable().clear();
            $('#table-users').DataTable().destroy();
            var find = $('#table-users tbody').find('tr');
            if (find) {
                $('#table-users tbody').empty();
            }
            var id = $('#users_id').val();

            var data = {
                'name': $('#updateName').val(),
                'email': $('#updateEmail').val(),
                'address': $('#updateAddress').val(),
                'phone_number' : $('#updatePhoneNumber').val(),
                'role_id': $('#updateRole').val(),
            }

            $.ajax({
                type: "PUT",
                url: "users-update/" + id,
                data: data,
                dataType: "json",
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
                    icon: data.status,
                    title: data.message
                    })
                $('#modal-update').modal('hide');
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
                    if (err.status == 422) { 
                        $.each(err.responseJSON.errors, function (i, error) {
                            var el = $(document).find('[name="'+i+'"]');
                            el.after($('<span style="color: red;">'+error[0]+'</span>'));
                        });
                    }
                }
            });
        });

        $(document).on('click', '.hapus_data', function (e) {
            e.preventDefault();
            var users_id = $(this).val();
            Swal.fire({
                    title: "Apa anda yakin ingin hapus data ini?!",
                    text: "Jika menghapus data ini, maka anda tidak dapat mengembalikannya",
                    type: "error",
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Ya",
                    showCancelButton: true,
                }).then((result) => {
                    if (result.isConfirmed) {
                    $.ajax({
                        type: "DELETE",
                        url: "users-delete/" + users_id,
                        dataType: "json",
                        success: function (response) {
                            console.log(response);
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
                            icon: response.status,
                            title: response.message
                            })
                            fetch();
                        }
                    });
                    }
                })
        });
    });
    </script>
@endpush