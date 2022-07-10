@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
  <div class="page-header">
      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
          <i class="mdi mdi-home"></i>
        </span> Testimonials
      </h3>
  </div>
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">List Data Testimonials</h4>
        <table class="table table-striped" id="table-testimonials">
          <thead>
            <tr>
              <th> Nama  </th>
              <th> Email </th>
              <th> Subjek </th>
              <th> Pesan </th>
              <th> Status </th>
              <th> Tanggal </th>
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
                <input type="hidden" id="testi_id">
                  <div class="row">
                    <div class="forms-group">
                        <label for="status" class="col-form-label">Status</label>
                        <select id="updateStatus" class="form-control select2bs4">
                          <option value="Tidak Tampilkan">Tidak Ditampilkan</option>
                          <option value="Tampilkan">Tampilkan</option>
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

    $(document).ready(function () {
      fetch();

      function fetch() {
        $.ajax({
            type: "GET",
            url : "{{route('admin/testimonialsFetch')}}",
            dataType :"json",
            success: function (reponse) {
                $('tbody').html("");
                $.each(reponse.testimonials, function (key,item) {
                  if (item.show == 'Tampilkan') {
                  var status_badge = '<td><label class="badge badge-success">'+item.show+'</label></td>'
                  } else {
                      var status_badge = '<td><label class="badge badge-warning">'+item.show+'</label></td>'
                  }
                    $('tbody').append('<tr>\
                        <td>' + item.name+ '</td>\
                        <td>' + item.email + '</td>\
                        <td>' + item.type + '</td>\
                        <td>' + item.messages + '</td>\
                        ' + status_badge+ '\
                        <td>' + moment(item.created_at).locale('id').format('LL') + '</td>\
                        <td class="text-center"><button type="button" value="' + item.id + '" class="btn btn-gradient-info btn-rounded btn-sm edit_data">Edit</button>\
                            <button type="button" value="' + item.id + '" class="btn btn-gradient-danger btn-rounded btn-sm hapus_data">Hapus</button>\
                        </td>\
                      \</tr>');
                });
                $('#table-testimonials').DataTable();
            }
        });
      }

      $(document).on('click', '.edit_data', function (e) {
        e.preventDefault();
        var testi_id = $(this).val();
        $('#modal-update').modal('show');
        $.ajax({
            type: "GET",
            url: "admin-testimonials-edit/" + testi_id,
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
                    $('#updateStatus').val(response.testimonials.show).trigger('change');
                    $('#testi_id').val(response.testimonials.id);
                
              }
            },
            complete: function(err) {
                fetch();
                $('#modal-update').modal('hide');
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

      $(document).on('click', '.update_data', function (e) {
        e.preventDefault();

        $(this).text('Progress....').attr('disabled', 'disabled')
        $('#table-testimonials').DataTable().clear();
        $('#table-testimonials').DataTable().destroy();
        var find = $('#table-testimonials tbody').find('tr');
        if (find) {
            $('#table-testimonials tbody').empty();
        }
        var id = $('#testi_id').val();

        var data = {
            'status': $('#updateStatus').val(),
        }

        $.ajax({
            type: "PUT",
            url: "admin-testimonials-update/" + id,
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
            complete: function(){
                    $('.update_data').text('Simpan').removeAttr('disabled')
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
        $('#table-testimonials').DataTable().clear();
        $('#table-testimonials').DataTable().destroy();
        var find = $('#table-testimonials tbody').find('tr');
        if (find) {
            $('#table-testimonials tbody' ).empty();
        }
        e.preventDefault();
        var testi_id = $(this).val();
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
                    url: "admin-testimonials-delete/" + testi_id,
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
                      }, 
                    complete: function() {
                      fetch();
                    }
                  });
                }
            })
      });
    });
  </script>
@endpush