@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
          <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-home"></i>
          </span> Breeding
        </h3>
    </div>
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
              <li class="nav-item">
                <a class="nav-link active" href="#">Breeding</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('admin/monitoringsBreed')}}">Monitoring</a>
              </li>
            </ul>
        </div>
        <div class="card-body">
          <h4 class="card-title">List Data Breeding</h4>
          <div class="card-description">
              <button type="button" class="btn btn-gradient-primary btn-fw" data-toggle="modal" data-target="#modal-create">
                  Tambah Data
                </button>
          </div>
          <table class="table table-striped" id="table-breeds">
            <thead>
              <tr>
                <th> Nama Jantan </th>
                <th> Nama Betina </th>
                <th> Tanggal Masuk </th>
                <th> Harga </th>
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
                            <label for="petname" class="col-form-label">Nama Betina</label>
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
                            <label for="petname" class="col-form-label">Nama Jantan</label>
                            <select id="petMale" class="form-control select2bs4" name="petMale">
                              <option value="" selected disabled>--Pilih Nama Pet--</option>
                              @foreach ($petAdmin as $value)
                                  <option value="{{$value->name}}">{{$value->name}}</option>
                              @endforeach
                          </select>
                        </div>
                    </div>
                    <div class="row">
                      <div class="forms-group">
                          <label for="start_at" class="col-form-label">Tanggal Masuk</label>
                          <input type="text" placeholder="dd/mm/yyyy" name="start_at" id="start_at" class="form-control">
                      </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label for="cages" class="col-form-label">Kandang</label>
                            <select id="cage_id" class="form-control select2bs4" name="cage_id">
                              <option value="" selected disabled>--Pilih Kandang--</option>
                              {{-- @foreach ($pets as $value)
                                  <option value="{{$value->id}}">{{$value->name}}</option>
                              @endforeach --}}
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
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
          </div>
            <form action="" method="" class="forms-sample">
                @csrf
                <div class="modal-body">
                  <input type="hidden" id="breeds_id">
                    <div class="row">
                        <div class="forms-group">
                            <label for="petname" class="col-form-label">Nama Betina</label>
                            <select id="updatePetName" class="form-control select2bs4" name="updatePetName">
                                <option value="" selected></option>
                              {{-- @foreach ($pets as $value)
                                  <option value="{{$value->id}}" >{{$value->name}}</option>
                              @endforeach --}}
                          </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="forms-group">
                            <label for="petname" class="col-form-label">Nama Jantan</label>
                            <select id="updatePetMale" class="form-control select2bs4" name="updatePetMale">
                              @foreach ($petAdmin as $value)
                                  <option value="{{$value->name}}">{{$value->name}}</option>
                              @endforeach
                          </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="forms-group">
                            <label for="service" class="col-form-label">Tanggal Masuk</label>
                            <input type="text" placeholder="dd/mm/yyyy" name="updateStartAt" id="updateStartAt" class="form-control" value="">
                        </div>
                      </div>
                    <div class="row">
                      <div class="forms-group">
                          <label for="status" class="col-form-label">Status</label>
                          <select id="updateStatus" class="form-control select2bs4">
                            <option value="Proses" data-value="Proses">Proses</option>
                            <option value="Selesai" data-value="Selesai">Selesai</option>
                        </select>
                      </div>
                  </div>
                  <div class="row">
                    <div class="form-group">
                        <label for="cages" class="col-form-label">Kandang</label>
                        <select id="updateCages" class="form-control select2bs4" name="updateCages">
                          <option value="" selected disabled>--Pilih Kandang--</option>
                          {{-- @foreach ($cages as $value)
                              <option value="{{$value->id}}" selected>{{$value->type_cages->alias}} - {{$value->number}}</option>
                          @endforeach --}}
                      </select>
                    </div>
                  </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-gradient-light btn-fw" data-bs-dismiss="modal">Kembali</button>
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

    $(document).ready( function () {
      $('#start_at').datepicker({
        dateFormat: 'yy-mm-dd'
        // minDate: 0
      });
      $('#updateStartAt').datepicker({
        dateFormat: 'yy-mm-dd'
        // minDate: 0
      });
    });

    $(document).ready(function() {
        fetch();

        function fetch() {
            $.ajax({
                type: "GET",
                url : "{{route('admin/breedsFetch')}}",
                dataType :"json",
                success: function (reponse) {
                    $('tbody').html("");
                    $.each(reponse.breeds, function (key,item) {
                        if (item.status == 'Selesai') {
                            var status_badge = '<td><label class="badge badge-success">'+item.status+'</label></td>'
                        } else {
                            var status_badge = '<td><label class="badge badge-warning">'+item.status+'</label></td>'
                        }
                        $('tbody').append('<tr>\
                            <td>' + item.pet_male + '</td>\
                            <td>' + item.pets.name + '</td>\
                            <td>' + moment(item.start_at).locale('id').format('LL') + '</td>\
                            <td>' + item.price + '</td>\
                                ' + status_badge+ '\
                            <td class="text-center"><button type="button" value="' + item.id + '" class="btn btn-gradient-info btn-rounded btn-sm edit_data">Edit</button>\
                                <button type="button" value="' + item.id + '" class="btn btn-gradient-danger btn-rounded btn-sm hapus_data">Hapus</button>\
                            </td>\
                            \</tr>');
                    });
                    $('#table-breeds').DataTable();
                }
            });
        }

        $(document).on('change', "#username", function(e) {
            $('select[name="petname"]').attr('disabled','disabled').find('option:nth-of-type(n+2)').remove()
                var user = $(e.target).find(':selected').val();
                if (user != null && user != '') {
                $.ajax({
                    type:'POST',
                    url:"{{ route('admin/refPetsBreeds') }}",
                    data:{user},
                    success:function(data){
                    console.log(data);
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
                    complete:function(e){
                        data = e.responseJSON.data;
                        console.log(data);
                        $.each(data,function (j,data){
                            $('select[name="petname"]').append($('<option>', { 
                                value: data['petsid'],
                                text : data['petsid']+' - '+ data['name'] 
                            }));
                        });
                        $('select[name="petname"]').removeAttr('disabled')
                    }
                })
            }
        });

        $(document).on('change', "#petname", function(e) {
            $('select[name="cage_id"]').attr('disabled','disabled').find('option:nth-of-type(n+2)').remove()
            var cage = $(e.target).find(':selected').val();
            if (cage != null && cage != '') {
                $.ajax({
                type:'POST',
                url:"{{ route('admin/refCagesBreeds') }}",
                data:{cage},
                success:function(data){
                console.log(data);
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
                complete:function(e){
                    data = e.responseJSON.data;
                    console.log(data);
                    $.each(data,function (j,data){
                        $('select[name="cage_id"]').append($('<option>', { 
                            value: data['id'],
                            text : data.type_cages['alias']+' - '+ data['number'] 
                        }));
                    });
                    $('select[name="cage_id"]').removeAttr('disabled')
                }
            })
            } else {
                $('select[name="cage_id"]').removeAttr('disabled')
            }

        });
        
        $(document).on('click', '.tambah_data', function (e) {
                e.preventDefault();

                $(this).text('Progress....').attr('disabled', 'disabled')
                $('#table-breeds').DataTable().clear();
                $('#table-breeds').DataTable().destroy();
                var find = $('#table-breeds tbody').find('tr');
                if (find) {
                    $('#table-breeds tbody').empty();
                }

                var data = {
                    'petname': $('#petname').val(),
                    'petmale': $('#petMale').val(),
                    'start_at': $('#start_at').val(),
                    'cage_id': $('#cage_id').val(),
                    'status': 'Proses',
                    'pickup' : 'Tidak',
                    'service_id': 3
                }

                $.ajax({
                    type: "POST",
                    url: "{{ route('admin/breedsStore') }}",
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
                        }})
                        Toast.fire({
                        icon: data.status,
                        title: data.message
                        });
                        $('#modal-create .close').click();
                        fetch();
                    },
                    complete: function(err){
                        $('.tambah_data').text('Simpan').removeAttr('disabled');
                        $('#username').val(null).trigger('change');
                        $('#petname').val(null).trigger('change');
                        $('#start_at').val('');
                        $('#modal-create .close').click();
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
            var breeds_id = $(this).val();
            console.log(breeds_id);
            $('#modal-update').modal('show');
            $.ajax({
                type: "GET",
                url: "breeds-edit/" + breeds_id,
                success: function (response) {
                    console.log(response.breeds.pet_id);
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
                    console.log(response.breeds.cages.type_cages);
                    $('#updatePetName').val(response.breeds.pet_id).trigger('change');
                    $('#updatePetMale').val(response.breeds.pet_male).trigger('change');
                    $('#updateStartAt').val(response.breeds.start_at);
                    $("#updateStatus").val(response.breeds.status).trigger('change');
                    $('#updateCages').val(response.breeds.cage_id).trigger('change');
                    $('#breeds_id').val(response.breeds.id);

                    data = response.petUser;
                    cage = response.cages;
                    console.log(data);
                    
                    var el = $(document).find('#updatePetName option');
                    el.remove();
                    $.each(data,function (j,data){
                        $('select[name="updatePetName"]').append($('<option>', { 
                            value: data['id'],
                            text : data['name'] 
                        }));
                    });

                    var el2 = $(document).find('#updateCages option');
                    el2.remove();
                    $('select[name="updateCages"]').append($('<option>', { 
                            value: response.breeds.cage_id,
                            text : response.breeds.cages.type_cages.alias+ '-' + response.breeds.cages.number
                    }));
                    $.each(cage,function (j,data){
                        $('select[name="updateCages"]').append($('<option>', { 
                            value: data['id'],
                            text : data.type_cages['alias']+ '-' + data['number'] 
                        }));
                    });
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
            $('#table-breeds').DataTable().clear();
            $('#table-breeds').DataTable().destroy();
            var find = $('#table-breeds tbody').find('tr');
            if (find) {
                $('#table-breeds tbody').empty();
            }
            var id = $('#breeds_id').val();

            var data = {
                'petname': $('#updatePetName').val(),
                'petMale': $('#updatePetMale').val(),
                'start_at': $('#updateStartAt').val(),
                'status': $('#updateStatus').val(),
                'cage_id': $('#updateCages').val()
            }

            $.ajax({
                type: "PUT",
                url: "breeds-update/" + id,
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
            var breeds_id = $(this).val();
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
                        url: "breeds-delete/" + breeds_id,
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

        $(document).on('click', '.close', function (e) {
            $('#username').val(null).trigger('change');
            $('#petname').val(null).trigger('change');
            $('#start_at').val('');
            $('#petMale').val('');
            $('#cages').val(null).trigger('change');

            // var el = $(document).find('#updatePetName option');
            // el.remove();
        })
    });
</script>
    
@endpush