@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
          <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-home"></i>
          </span> Pet
        </h3>
    </div>
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">List Data Pet</h4>
          <div class="card-description">
              <button type="button" class="btn btn-gradient-primary btn-fw" data-toggle="modal" data-target="#modal-create">
                  Tambah Data
                </button>
          </div>
          <table class="table table-striped" id="table-pets">
            <thead>
              <tr>
                <th> Nama Pet </th>
                <th> Jenis </th>
                <th> Ras</th>
                <th> Berat (kg) </th>
                <th> Warna </th>
                <th> BOD </th>
                <th> Pemilik </th>
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
                            <label for="name">Nama Pet</label>
                            <input type="text" name="name" id="name" class="form-control">
                          </div>
                    </div>
                    <div class="row">
                        <div class="forms-group">
                            <label for="type" class="col-form-label">Jenis Pet</label>
                            <select id="type" class="form-control select2bs4" name="type">
                              <option value="">--Pilih Jenis--</option>
                              @foreach ($type as $value)
                                  <option value="{{$value->id}}">{{$value->name}}</option>
                              @endforeach
                          </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="forms-group">
                            <label for="race" class="col-form-label">Ras</label>
                            <input type="text" name="race" id="race" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="forms-group">
                            <label for="weight" class="col-form-label">Weight</label>
                            <input type="text" name="weight" id="weight" class="form-control" maxlength="2">
                        </div>
                    </div>
                    <div class="row">
                        <div class="forms-group">
                            <label for="colour" class="col-form-label">Warna</label>
                            <input type="text" name="colour" id="colour" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="forms-group">
                            <label for="birthday" class="col-form-label">Birth od Date</label>
                            <input type="text" name="birthday" id="birthday" class="form-control" placeholder="mm/dd/yyyy">
                        </div>
                    </div>
                    <div class="row">
                        <div class="forms-group">
                            <label for="status" class="col-form-label">Gender</label>
                            <select id="gender" class="form-control select2bs4" name="gender">
                              <option value="">--Pilih Gender--</option>
                              <option value="Jantan">Jantan</option>
                              <option value="Betina">Betina</option>
                          </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="forms-group">
                            <label for="users" class="col-form-label">Pemilik</label>
                            <select id="users" name="users" id="users" class="form-control select2bs4">
                              <option value="" selected disabled>--Pilih Pemilik--</option>
                                @foreach ($users as $value)
                                    <option value="{{$value->id}}">{{$value->roles->name}} - {{$value->name}}</option>
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
                  <input type="hidden" id="pets_id">
                    <div class="row">
                        <div class="forms-group">
                            <label for="name" class="col-form-label">Nama Pet</label>
                            <input type="text" name="updateName" id="updateName" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="forms-group">
                            <label for="roles" class="col-form-label">Jenis Pet</label>
                            <select id="updateType" name="updateType" class="form-control select2bs4">
                              <option value="" disabled>--Pilih Jenis--</option>
                                @foreach ($type as $value)
                                    <option value="{{$value->id}}">{{$value->name}}</option>
                                @endforeach
                          </select>
                        </div>
                      </div>
                    <div class="row">
                        <div class="forms-group">
                            <label for="race" class="col-form-label">Ras</label>
                            <input type="text" name="updateRace" id="updateRace" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="forms-group">
                            <label for="weight" class="col-form-label">Weight</label>
                            <input type="text" name="updateWeight" id="updateWeight" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="forms-group">
                            <label for="colour" class="col-form-label">Warna</label>
                            <input type="text" name="updateColour" id="updateColour" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="forms-group">
                            <label for="birthday" class="col-form-label">Birth of Date</label>
                            <input type="text" name="updateBirthday" id="updateBirthday" class="form-control" placeholder="mm/dd/yyyy">
                        </div>
                    </div>
                    <div class="row">
                        <div class="forms-group">
                            <label for="status" class="col-form-label">Gender</label>
                            <select id="updateGender" class="form-control select2bs4">
                              <option value="">--Pilih Gender--</option>
                              <option value="Jantan">Jantan</option>
                              <option value="Betina">Betina</option>
                          </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="forms-group">
                            <label for="users" class="col-form-label">Pemilik</label>
                            <select id="updateUser" name="updateUser" id="roles" class="form-control select2bs4">
                              <option value="" disabled>--Pilih Pemilik--</option>
                                @foreach ($users as $value)
                                    <option value="{{$value->id}}">{{$value->roles->name}} - {{$value->name}}</option>
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

        $(document).ready(function() {
            $('#birthday').datepicker({
                dateFormat: 'yy-mm-dd',
            });
        });

        $(document).ready(function () {
            fetch();

            $('input').on('keydown', function(event) {
                if (this.selectionStart == 0 && event.keyCode >= 65 && event.keyCode <= 90 && !(event.shiftKey) && !(event.ctrlKey) && !(event.metaKey) && !(event.altKey)) {
                var $t = $(this);
                event.preventDefault();
                var char = String.fromCharCode(event.keyCode);
                $t.val(char + $t.val().slice(this.selectionEnd));
                this.setSelectionRange(1,1);
                }
            });

            function fetch() {
                $('#table-pets').DataTable().clear();
                $('#table-pets').DataTable().destroy();
                var find = $('#table-pets tbody').find('tr');
                if (find) {
                    $('#table-pets tbody').empty();
                }
                $.ajax({
                    type: "GET",
                    url : "{{route('admin/petsFetch')}}",
                    dataType :"json",
                    success: function (reponse) {
                        $('tbody').html("");
                        $.each(reponse.pets, function (key,item) {
                            $('tbody').append('<tr>\
                                <td>' + item.name + '</td>\
                                <td>' + item.type_pets.name + '</td>\
                                <td>' + item.race + '</td>\
                                <td>' + item.weight + '</td>\
                                <td>' + item.colour +'</td>\
                                <td>' + moment(item.birthday).locale('id').format('LL') + '</td>\
                                <td>' + item.users.name +'</td>\
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
                $('#table-pets').DataTable().clear();
                $('#table-pets').DataTable().destroy();
                var find = $('#table-pets tbody').find('tr');
                if (find) {
                    $('#table-users tbody').empty();
                }

                var data = {
                    'name': $('#name').val(),
                    'race': $('#race').val(),
                    'type':  $('#type').val(),
                    'weight': $('#weight').val(),
                    'colour' : $('#colour').val(),
                    'users': $('#users').val(),
                    'birthday': $('#birthday').val(),
                    'gender': $('#gender').val(),
                }

                $.ajax({
                    type: "POST",
                    url: "{{ route('admin/petsStore') }}",
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
                        $('#name').val(),
                        $('#race').val(),
                        $('#type').val(null).trigger('change'),
                        $('#addresweights').val(),
                        $('#colour').val(),
                        $('#users').val(null).trigger('change'),
                        $('#birthday').val(),
                        $('#gender').val(null).trigger('change'),
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

            $(document).on('click', '.edit_data', function (e) {
                e.preventDefault();
                var pets_id = $(this).val();
                console.log(pets_id);
                $('#modal-update').modal('show');
                $.ajax({
                    type: "GET",
                    url: "pets-edit/" + pets_id,
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
                            $('#updateName').val(response.pets.name);
                            $('#updateRace').val(response.pets.race);
                            $('#updateWeight').val(response.pets.weight);
                            $('#updateColour').val(response.pets.colour);
                            $('#updateBirthday').val(response.pets.birthday);
                            $('#updateRole').val(response.pets.role_id).trigger('change');
                            $('#updateGender').val(response.pets.role_id).trigger('change');
                            $('#updateType').val(response.pets.type_pet_id).trigger('change');
                            $('#users_id').val(response.pets.id);
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
                $('#table-pets').DataTable().clear();
                $('#table-pets').DataTable().destroy();
                var find = $('#table-pets tbody').find('tr');
                if (find) {
                    $('#table-pets tbody').empty();
                }
                var id = $('#pets_id').val();

                var data = {
                    'name': $('#updateName').val(),
                    'race': $('#updateRace').val(),
                    'weight': $('#updateWeight').val(),
                    'colour': $('#updateColour').val(),
                    'birthday': $('#updateBirthday').val(),
                    'type': $('#updateType').val(),
                    'gender': $('#updateGender').val(),
                    'users': $('#updateUser').val()
                }

                $.ajax({
                    type: "PUT",
                    url: "pets-update/" + id,
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
                    },
                    complete: function(err){
                        $('.update_data').text('Simpan').removeAttr('disabled');
                        $('#modal-update').modal('hide');
                        fetch();
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

                $(this).text('Progress....').attr('disabled', 'disabled')
                $('#table-pets').DataTable().clear();
                $('#table-pets').DataTable().destroy();
                var find = $('#table-pets tbody').find('tr');
                if (find) {
                    $('#table-pets tbody').empty();
                }
                var grooms_id = $(this).val();
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
                            url: "pets-delete/" + grooms_id,
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