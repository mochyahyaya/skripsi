@extends('layouts.admin')

@section('content')
<style>
    body{margin-top:20px;
        color: #9b9ca1;
    }
    .bg-secondary-soft {
        background-color: rgba(208, 212, 217, 0.553) !important;
    }
    .rounded {
        border-radius: 5px !important;
    }
    .py-5 {
        padding-top: 3rem !important;
        padding-bottom: 3rem !important;
    }
    .px-4 {
        padding-right: 1.5rem !important;
        padding-left: 1.5rem !important;
    }
    p, h5 {
      color: black
    }
</style>
<section class="content-wrapper">
  <div class="page-header">
    <h3 class="page-title">
      <span class="page-title-icon bg-gradient-primary text-white me-2">
        <i class="mdi mdi-home"></i>
      </span> Monitoring Breeding
    </h3>
</div>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="my-5">
          <h3>Monitoring Boarding</h3>
          <hr>
        <div class="row mb-5 gx-5">
          <div class="col-xxl-12 mb-5 mb-xxl-0">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Foto Monitoring</h4>
                <section id="gallery">
                    <table class="table" id="table-monitoring">
                        <tr>
                            <th>#</th>
                            <th>Kondisi Makan</th>
                            <th>Kondisi Suhu Badan</th>
                            <th>Kebutuhan Obat</th>
                            <th>Tanggal Cek</th>
                            <th>Foto Monitoring</th>
                        </tr>
                        <tbody>
                          @foreach ($hotels as $value)
                              <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$value->food}}</td>
                                <td>{{$value->temperature}}</td>
                                <td>{{$value->medicine ?? 'Tidak Perlu'}}'</td>
                                <td>{{ \Carbon\Carbon::parse($value->created_at)->locale('id')->isoFormat('LLLL')}}</td>
                                <td><a href="{{route('admin/monitoringsGaleryHotel', $value->hotel_id)}}">Galeri</a></td>
                              </tr>
                          @endforeach
                        </tbody>
                    </table>
                </section>
              </div>
            </div>
          </div>
        </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
@push('scripts')
    <script>
        $('#table-monitoring').DataTable();
    </script>
@endpush
