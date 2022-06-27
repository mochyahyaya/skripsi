@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
          <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-home"></i>
          </span> Monitoring Boarding
        </h3>
    </div>
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
              <li class="nav-item">
                <a class="nav-link" href="{{route('admin/hotels')}}">Boarding</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="#">Monitoring</a>
              </li>
            </ul>
          </div>
        <div class="card-body">
          <h4 class="card-title">List Monitoring</h4>
          <section id="gallery">
            <div class="row">
                @foreach ($hotels as $value)
                <div class="col-lg-3 mb-4">
                    <div class="card">
                        <img src="https://images.unsplash.com/photo-1477862096227-3a1bb3b08330?ixlib=rb-1.2.1&auto=format&fit=crop&w=700&q=60" alt="" class="card-img-top">
                        <div class="card-body">
                        <h5 class="card-title">{{$value->cages->type_cages->alias}} - {{$value->cages->number}} </h5>
                        <p class="card-text">Nama Pet: <span>{{$value->pets->name}}</span></p>
                        <p class="card-text">Jenis Pet: <span>{{$value->pets->typePets->name}}</span></p>
                        <p class="card-text">Tanggal Masuk: <span>{{ \Carbon\Carbon::parse($value->start_at)->translatedFormat('d F Y')}}</span></p>
                        <p class="card-text">Tanggal Keluar: <span>{{ \Carbon\Carbon::parse($value->end_at)->translatedFormat('d F Y')}}</span></p>
                        <button class="btn btn-gradient-primary btn-sm" value="{{$value->id}}" id="monit-data"><i class="fa-solid fa-house-medical"></i></button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
          </section>
        </div>
      </div>
    </div>
</div>

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
                        <div class="form-group">
                            <label for="username">Kondisi Makan</label>
                                <div class="form-check">
                                <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input" name="food" value="Baik"> Baik <i class="input-helper"></i></label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="food" value="Tidak Baik"> Tidak Baik <i class="input-helper"></i></label>
                                </div>
                          </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label for="username">Kondisi Suhu Badan</label>
                                <div class="form-check">
                                <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input" name="temperature" value="Normal"> Normal <i class="input-helper"></i></label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="temperature" value="Tidak Normal"> Tidak Normal <i class="input-helper"></i></label>
                                </div>
                          </div>
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
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            $(document).on('click', '#monit-data', function(e) {
                $('#modal-create').modal('show');
                var hours = moment().valueOf();
                var limit1 = moment('8:00am', 'h:mma').valueOf();
                var limit2 = moment('1:00pm', 'h:mma').valueOf();
                var limit3 = moment('8:00pm', 'h:mma').valueOf();
                console.log(limit2);
            });
        });

        $(function() {
            var now = new Date();
            var hours = moment().valueOf();
            var limit =moment('5:00pm', 'h:mma').valueOf();
            $button = $('.tambah_data');

            if ( hours < limit) {
                $button.prop( "disabled", "disabled" );
            } else {
                $button.prop( "disabled", false ); 
                }

            $button.click(function() {
                if ($(this).is(':disabled')) {
                    alert('We are not accepting entries during weekends.')
                    return;
                }
            });
        });
    </script>
@endpush