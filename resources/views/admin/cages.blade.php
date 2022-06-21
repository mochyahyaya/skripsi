@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
          <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-home"></i>
          </span> Kandang
        </h3>
    </div>
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">List Data Kandang</h4>
          <div class="card-description">
              <button type="button" class="btn btn-gradient-primary btn-fw" data-toggle="modal" data-target="#modal-create">
                  Tambah Data
                </button>
          </div>
          <table class="table table-striped" id="table-cages">
            <thead>
              <tr>
                <th> Jenis Kandang</th>
                <th> Nomor Kandang </th>
                <th> Nama Kandang </th>
                <th> Batas Tampung </th>
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
                            <label for="type">Jenis Kandang</label>
                            <select name="tpye" id="type" class="form-control select2bs4">
                                @foreach ($typeCages as $value)    
                                    <option value="{{$value->id}}">{{$value->name}}</option>
                                @endforeach
                            </select>
                          </div>
                    </div>
                    <div class="row">
                        <div class="forms-group">
                            <label for="number" class="col-form-label">Nomor Kandang</label>
                            <input type="text" name="number" id="number" class="form-control" maxlength="3">
                        </div>
                    </div>
                    <div class="row">
                        <div class="forms-group">
                            <label for="count" class="col-form-label">Batas Tampung</label>
                            <input type="text" name="count" id="count" class="form-control" maxlength="2">
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
                  <input type="hidden" id="cages_id">
                    <div class="row">
                        <div class="forms-group">
                            <label for="type" class="col-form-label">Tipe Kandang</label>
                            <select name="updateType" id="updateType" class="form-control select2bs4">
                                @foreach ($typeCages as $value)
                                    <option value="{{$value->id}}" selected>{{$value->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="forms-group">
                            <label for="number" class="col-form-label">Nomor Kandang</label>
                            <input type="text" name="updateNumber" id="updateNumber" class="form-control" maxlength="3">
                        </div>
                    </div>
                    <div class="row">
                        <div class="forms-group">
                            <label for="address" class="col-form-label">Batas Tampung</label>
                            <input type="text" name="updateCount" id="updateCount" class="form-control" maxlength="2">
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
        $('#table-cages').DataTable();
    });

    
    $(document).ready(function () {
        fetch();

        function fetch() {
            $.ajax({
                type: "GET",
                url : "{{route('admin/cagesFetch')}}",
                dataType :"json",
                success: function (response) {
                    $('tbody').html("");
                    $.each(response.cages, function (key,item) {
                        console.log(response.cages);
                        $('tbody').append('<tr>\
                            <td>' + item.type_cage_id+ '</td>\
                            <td>' + item.number + '</td>\
                            <td>' + item.type_cage_id + ' - '+item.type_cage_id+'</td>\
                            <td>' + item.count + '</td>\
                            <td class="text-center"><button type="button" value="' + item.id + '" class="btn btn-gradient-info btn-rounded btn-sm edit_data">Edit</button>\
                                <button type="button" value="' + item.id + '" class="btn btn-gradient-danger btn-rounded btn-sm hapus_data">Hapus</button>\
                            </td>\
                        \</tr>');
                    });
                    $('#table-cages').DataTable();
                }
            });
        }

        
        $(document).on('click', '.tambah_data', function (e) {
            e.preventDefault();

            $(this).text('Progress....').attr('disabled', 'disabled')
            $('#table-users').DataTable().clear();
            $('#table-users').DataTable().destroy();
            var find = $('#table-users tbody').find('tr');
            if (find) {
                $('#table-users tbody').empty();
            }

            var data = {
                'type': $('#type').val(),
                'number': $('#number').val(),
                'count': $('#count').val(),
                'counter': 0
            }

            $.ajax({
                type: "POST",
                url: "{{ route('admin/cagesStore') }}",
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
                complete: function(err){
                    $('#modal-create').modal('hide');
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

        $(document).on('click', '.edit_data', function (e) {
            e.preventDefault();
            var cages_id = $(this).val();
            console.log(cages_id);
            $('#modal-update').modal('show');
            $.ajax({
                type: "GET",
                url: "cages-edit/" + cages_id,
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
                        $('#updateType').val(response.cages.type_cage_id);
                        $('#updateNumber').val(response.cages.number);
                        $('#updateCount').val(response.cages.count);
                        $('#cages_id').val(response.cages.id);
                        // $("#updateType option[data-value='" + response.cages.type_cage_id +"']").attr("selected","selected");
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
    });
    </script>
@endpush