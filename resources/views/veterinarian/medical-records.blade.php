@extends('layouts.veterinarian')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.css" integrity="sha256-NAxhqDvtY0l4xn+YVa6WjAcmd94NNfttjNsDmNatFVc=" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />
<style>
    body{
    color: #6c757d;
    background-color: #f5f6f8;
    margin-top:20px;
    }
    .card-box {
        background-color: #fff;
        background-clip: border-box;
        border: 1px solid #e7eaed;
        padding: 1.5rem;
        margin-bottom: 24px;
        border-radius: .25rem;
    }
    .avatar-xl {
        height: 6rem;
        width: 6rem;
    }
    .rounded-circle {
        border-radius: 50%!important;
    }
    .nav-pills .nav-link.active, .nav-pills .show>.nav-link {
        color: #fff;
        background-color: #1abc9c;
    }
    .nav-pills .nav-link {
        border-radius: .25rem;
    }
    .navtab-bg li>a {
        background-color: #f7f7f7;
        margin: 0 5px;
    }
    .nav-pills>li>a, .nav-tabs>li>a {
        color: #6c757d;
        font-weight: 600;
    }
    .mb-4, .my-4 {
        margin-bottom: 2.25rem!important;
    }
    .tab-content {
        padding: 20px 0 0 0;
    }
    .progress-sm {
        height: 5px;
    }
    .m-0 {
        margin: 0!important;
    }
    .table .thead-light th {
        color: #6c757d;
        background-color: #f1f5f7;
        border-color: #dee2e6;
    }
    .social-list-item {
        height: 2rem;
        width: 2rem;
        line-height: calc(2rem - 4px);
        display: block;
        border: 2px solid #adb5bd;
        border-radius: 50%;
        color: #adb5bd;
    }

    .text-purple {
        color: #6559cc!important;
    }
    .border-purple {
        border-color: #6559cc!important;
    }

    .timeline {
        margin-bottom: 50px;
        position: relative;
    }
    .timeline:before {
        background-color: #dee2e6;
        bottom: 0;
        content: "";
        left: 50%;
        position: absolute;
        top: 30px;
        width: 2px;
        z-index: 0;
    }
    .timeline .time-show {
        margin-bottom: 30px;
        margin-top: 30px;
        position: relative;
    }
    .timeline .timeline-box {
        background: #fff;
        display: block;
        margin: 15px 0;
        position: relative;
        padding: 20px;
    }
    .timeline .timeline-album {
        margin-top: 12px;
    }
    .timeline .timeline-album a {
        display: inline-block;
        margin-right: 5px;
    }
    .timeline .timeline-album img {
        height: 36px;
        width: auto;
        border-radius: 3px;
    }
    @media (min-width: 768px) {
        .timeline .time-show {
            margin-right: -69px;
            text-align: right;
        }
        .timeline .timeline-box {
            margin-left: 45px;
        }
        .timeline .timeline-icon {
            background: #dee2e6;
            border-radius: 50%;
            display: block;
            height: 20px;
            left: -54px;
            margin-top: -10px;
            position: absolute;
            text-align: center;
            top: 50%;
            width: 20px;
        }
        .timeline .timeline-icon i {
            color: #98a6ad;
            font-size: 13px;
            position: absolute;
            left: 4px;
        }
        .timeline .timeline-desk {
            display: table-cell;
            vertical-align: top;
            width: 50%;
        }
        .timeline-item {
            display: table-row;
        }
        .timeline-item:before {
            content: "";
            display: block;
            width: 50%;
        }
        .timeline-item .timeline-desk .arrow {
            border-bottom: 12px solid transparent;
            border-right: 12px solid #fff !important;
            border-top: 12px solid transparent;
            display: block;
            height: 0;
            left: -12px;
            margin-top: -12px;
            position: absolute;
            top: 50%;
            width: 0;
        }
        .timeline-item.timeline-item-left:after {
            content: "";
            display: block;
            width: 50%;
        }
        .timeline-item.timeline-item-left .timeline-desk .arrow-alt {
            border-bottom: 12px solid transparent;
            border-left: 12px solid #fff !important;
            border-top: 12px solid transparent;
            display: block;
            height: 0;
            left: auto;
            margin-top: -12px;
            position: absolute;
            right: -12px;
            top: 50%;
            width: 0;
        }
        .timeline-item.timeline-item-left .timeline-desk .album {
            float: right;
            margin-top: 20px;
        }
        .timeline-item.timeline-item-left .timeline-desk .album a {
            float: right;
            margin-left: 5px;
        }
        .timeline-item.timeline-item-left .timeline-icon {
            left: auto;
            right: -56px;
        }
        .timeline-item.timeline-item-left:before {
            display: none;
        }
        .timeline-item.timeline-item-left .timeline-box {
            margin-right: 45px;
            margin-left: 0;
            text-align: right;
        }
    }
    @media (max-width: 767.98px) {
        .timeline .time-show {
            text-align: center;
            position: relative;
        }
        .timeline .timeline-icon {
            display: none;
        }
    }
    .timeline-sm {
        padding-left: 110px;
    }
    .timeline-sm .timeline-sm-item {
        position: relative;
        padding-bottom: 20px;
        padding-left: 40px;
        border-left: 2px solid #dee2e6;
    }
    .timeline-sm .timeline-sm-item:after {
        content: "";
        display: block;
        position: absolute;
        top: 3px;
        left: -7px;
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background: #fff;
        border: 2px solid #1abc9c;
    }
    .timeline-sm .timeline-sm-item .timeline-sm-date {
        position: absolute;
        left: -104px;
    }
    @media (max-width: 420px) {
        .timeline-sm {
            padding-left: 0;
        }
        .timeline-sm .timeline-sm-date {
            position: relative !important;
            display: block;
            left: 0 !important;
            margin-bottom: 10px;
        }
    }
    .middle {
        transition: .5s ease;
        opacity: 0;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        text-align: center;
    }
</style>
<div class="container">
<div class="row">
    <div class="col-lg-4 col-xl-4">
        @foreach ($pets as $value)
        <div class="card-box text-center">
            <img src="{!!asset('images/featured_image/'.$value->filename) !!}" class="rounded-circle avatar-xl img-thumbnail" alt="profile-image">

            <h4 class="mb-0">{{$value->name}}</h4>
            <p class="text-muted">{{$value->typePets->name}}</p>

            <table class="table table-borderless text-left">
                <thead>
                    <tr>
                        <td ><strong>Pemilik</strong> </td>
                        <td><span class=""> {{$value->users->name}}</span></td>
                    </tr>
                    <tr>
                        <td><strong>BOD</strong>  </td>
                        <td><span class="">{{ \Carbon\Carbon::parse($value->birthday)->locale('id')->format('d F Y')}}</span></td>
                    </tr>
                    <tr>
                        <td><strong>Ras</strong>  </td>
                        <td><span class="">{{$value->race}}</span></td>
                    </tr>
                    <tr>
                        <td><strong>Berat</strong>  </td>
                        <td><span class="">{{$value->weight}}</span></td>
                    </tr>
                    <tr>
                        <td><strong>Warna</strong>  </td>
                        <td><span class="">{{$value->colour}}</span></td>
                    </tr>
                    <tr>
                        <td><strong>Gender</strong>  </td>
                        <td><span class="">{{$value->gender}}</span></td>
                    </tr>
                </thead>
            </table>
        </div> <!-- end card-box -->
        @endforeach

        <div class="card-box">
            <h4 class="header-title">Pet lain yang di miliki</h4>

            <div class="pt-1">
                @foreach ($otherpets as $value)
                <a href="{{route('veterinarian/medicalRecords', $value->id)}}">
                    <img src="{!!asset('images/featured_image/'.$value->filename) !!}" class="rounded-circle avatar-xl img-thumbnail mb-1 mt-1" alt="{{$value->name}}">
                 </a> 
                @endforeach
            </div>
        </div> <!-- end card-box-->

    </div> <!-- end col-->

    <div class="col-lg-8 col-xl-8">
        <div class="card-box">
            <ul class="nav nav-pills navtab-bg">
                <li class="nav-item">
                    <a href="#about-me" data-toggle="tab" aria-expanded="true" class="nav-link ml-0 active">
                        <i class="mdi mdi-face-profile mr-1"></i>Profil Pet
                    </a>
                </li>
            </ul>

            <div class="tab-content">
                
                <div class="tab-pane show active" id="about-me">

                    <h5 class="mb-4 text-uppercase"><i class="mdi mdi-briefcase mr-1"></i>
                        Jadwal Berkunjung</h5>
                    @foreach ($medicalrecords as $value)
                    <ul class="list-unstyled timeline-sm">
                        <li class="timeline-sm-item">
                            <span class="timeline-sm-date">{{ \Carbon\Carbon::parse($value->created_at)->locale('id')->format('d F Y')}}</span>
                            <h5 class="mt-0 mb-1">{{$value->needed}}</h5>
                        </li>
                    </ul>
                    @endforeach

                    <h5 class="mb-3 mt-4 text-uppercase"><i class="mdi mdi-cards-variant mr-1"></i>
                        Tabel Kunjungan</h5>
                        @foreach ($pets as $value)
                            <button class="btn btn-primary mb-2" data-toggle="modal" data-target="#modal-create" data-id= "{{$value->id}}">
                                Tambah Data Rekam Medis
                            </button>
                        @endforeach
                    <div class="table-responsive">
                        <table class="table table-borderless mb-0" id="table-medical-records">
                            <thead class="thead-light">
                                <tr>
                                    <th>Keperluan</th>
                                    <th>Gejala</th>
                                    <th>Penanangan</th>
                                    <th>Hari Kunjungan</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($medicalrecords as $value)
                                    <tr>
                                        <td>{{$value->needed}}</td>
                                        <td>{{$value->indication}}</td>
                                        <td>{{$value->treatment}}</td>
                                        <td>{{ \Carbon\Carbon::parse($value->created_at)->locale('id')->format('d F Y')}}</td>
                                        @if ($value->status == 'Sehat')
                                            <td><label class="badge badge-success">{{$value->status}}</label></td>
                                        @else
                                            <td><label class="badge badge-danger">{{$value->status}}</label></td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
                <!-- end timeline content-->

            </div> <!-- end tab-content -->
        </div> <!-- end card-box-->

    </div> <!-- end col -->
</div>
</div>

{{-- Modal create --}}
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
                            <label for="username">Keperluan</label>
                            <input type="text" class="form-control" name="needed" id="needed">
                        </div>
                    </div>
                    <div class="row">
                        <div class="forms-group">
                            <label for="username">Gejala</label>
                            <input type="text" class="form-control" name="indication" id="indication">
                        </div>
                    </div>
                    <div class="row">
                        <div class="forms-group">
                            <label for="username">Penanganan</label>
                            <input type="text" class="form-control" name="treatment" id="treatment">
                        </div>
                    </div>
                    <div class="row">
                        <div class="forms-group">
                            <label for="username">Status</label>
                            <select name="status" id="status" class="form-control select2bs4">
                                <option value="" disabled selected>--Keadaan Hewan--</option>
                                <option value="Sehat">Sehat</option>
                                <option value="Sakit">Sakit</option>
                            </select>
                        </div>
                  </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-gradient-light btn-fw close" data-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-gradient-primary btn-fw tambah_data">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Modal Update --}}
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
                  <input type="hidden" id="medical_id">
                    <div class="row">
                        <div class="forms-group">
                            <label for="petname" class="col-form-label">Keperluan</label>
                            <input type="text" class="form-control" name="updateNeeded" id="updateNeeded">
                        </div>
                    </div>
                    <div class="row">
                        <div class="forms-group">
                            <label for="petname" class="col-form-label">Gejala</label>
                            <input type="text" class="form-control" name="updateIndication" id="updateIndication">
                        </div>
                    </div>
                    <div class="row">
                        <div class="forms-group">
                            <label for="petname" class="col-form-label">Penanganan</label>
                            <input type="text" class="form-control" name="updateTreatment" id="updateTreatment">
                        </div>
                    </div>
                    <div class="row">
                      <div class="forms-group">
                          <label for="status" class="col-form-label">Status</label>
                          <select id="updateStatus" class="form-control select2bs4">
                            <option value="Sakit">Proses</option>
                            <option value="Sehat">Selesai</option>
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
        $('#table-medical-records').DataTable();
        // fetch();

        // function fetch() {
        //     $.ajax({
        //         type: "GET",
        //         url : "{{route('veterinarian/medicalRecordsFetch')}}",
        //         dataType :"json",
        //         success: function (reponse) {
        //             $('tbody').html("");
        //             $.each(reponse.medical, function (key,item) {
        //                 if (item.status == 'Sehat') {
        //                 var status_badge = '<td><label class="badge badge-success">'+item.status+'</label></td>'
        //                 } else {
        //                     var status_badge = '<td><label class="badge badge-danger">'+item.status+'</label></td>'
        //                 }
        //                 $('tbody').append('<tr>\
        //                     <td>' + item.needed + '</td>\
        //                     <td>' + item.indication + '</td>\
        //                     <td>' + item.treatment + '</td>\
        //                     <td>' + moment(item.created_at).locale('id').format('LL') + '</td>\
        //                     ' + status_badge + '\
        //                 \</tr>');
        //             });
        //             $('#table-medical-records').DataTable();
        //         }
        //     });
        // }
        
        $('#modal-create').on('show.bs.modal', function (e) {
            // e.preventDefault();

            var link = $(e.relatedTarget);
            var modal = $(this);

            var id = link.data('id')
            console.log(id);

            modal.find('button[type="submit').on('click', function(e) {
            $(this).text('Progress....').attr('disabled', 'disabled')
            // $('#table-medical-records').DataTable().clear();
            // $('#table-medical-records').DataTable().destroy();
            // var find = $('#table-medical-records tbody').find('tr');
            // if (find) {
            //     $('#table-medical-records tbody').empty();
            // }

            var data = {
                'needed': $('#needed').val(),
                'indication': $('#indication').val(),
                'treatment': $('#treatment').val(),
                'status': $('#status').val(),
                'id': id
            }

            $.ajax({
                type: "POST",
                url: "{{ route('veterinarian/medicalRecordsStore') }}",
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
                    $('.tambah_data').text('Simpan').removeAttr('disabled')
                    $('#status').val(null).trigger('change');
                    $('#modal-create .close').click();
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
        });

        $(document).on('click', '.edit_data', function (e) {
            e.preventDefault();
            var medical_id = $(this).val();
            $('#modal-update').modal('show');
            $.ajax({
                type: "GET",
                url: "medical-records/" + medical_id,
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
                        $('#updateNeeded').val(response.medical.pet_id);
                        $('#updateIndication').val(response.medical.service);
                        $('#updateTreatment').val(response.medical.status);
                        $('#updateStatus').val(response.medical.status).trigger('change');
                        $('#medical_id').val(response.medical.id);
                    }
                },
                complete: function(err) {
                    // fetch();
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
            // $('#table-medical-records').DataTable().clear();
            // $('#table-medical-records').DataTable().destroy();
            // var find = $('#table-medical-records tbody').find('tr');
            // if (find) {
            //     $('#table-medical-records tbody').empty();
            // }
            var id = $('#medical_id').val();

            var data = {
                'needed': $('#updateNeeded').val(),
                'indication': $('#updateIndication').val(),
                'treatment': $('#updateTreatment').val(),
                'status': $('#updateStatus').val(),
            }

            $.ajax({
                type: "PUT",
                url: "medical-records-update/" + id,
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
    });
</script>
    
@endpush