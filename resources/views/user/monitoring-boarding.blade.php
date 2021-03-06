@extends('layouts.user')

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
<section class="inner-page">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="my-5">
          <h3>Monitoring Boarding</h3>
          <hr>
        <div class="row mb-5 gx-5">
          <div class="col-xxl-12 mb-5 mb-xxl-0">
            <div class="card">
              <div class="card-header">
                  <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                      <a class="nav-link active" href="">Boarding</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{route('user/userMonitoringBreeds')}}">Breeding</a>
                    </li>
                  </ul>
                </div>
              <div class="card-body">
                <h4 class="card-title">List Monitoring</h4>
                <section id="gallery">
                  <div class="row">
                      @foreach ($hotels as $value)
                      <div class="col-lg-3 mb-4">
                        {{-- {{dd($value)}} --}}
                          <div class="card">
                              <img src="{!! asset('images/featured_image/'.$value->filename) !!}" alt="" class="card-img-top">
                              <div class="card-body">
                                <h5 class="card-title">{{$value->cages->type_cages->alias}} - {{$value->cages->number}} </h5>
                                <p class="card-text">Nama Pet: <span>{{$value->pets->name}}</span></p>
                                <p class="card-text">Jenis Pet: <span>{{$value->pets->typePets->name}}</span></p>
                                <p class="card-text">Tanggal Masuk: <span>{{ \Carbon\Carbon::parse($value->start_at)->translatedFormat('d F Y')}}</span></p>
                                <p class="card-text">Tanggal Keluar: <span>{{ \Carbon\Carbon::parse($value->end_at)->translatedFormat('d F Y')}}</span></p>
                                <a href="{{route('user/userMonitoringPhoto', $value->hotelsid)}}" class="card-text">Foto</a>
                                <a href="{{route('user/userMonitoringTable', $value->hotelsid)}}" class="card-text">Tabel </a>
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
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
