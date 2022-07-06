@extends('layouts.user')

@section('content')

<section class="inner-page">
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
                        @if ($value->pets->type_pet_id == 1)
                            <img src="{!! asset('PurpleAdmin/assets/images/CatCage.jpg') !!}" alt="" class="card-img-top">
                        @else
                            <img src="{!! asset('PurpleAdmin/assets/images/DogCage.jpg') !!}" alt="" class="card-img-top">
                        @endif
                        <img src="" alt="" class="card-img-top">
                        <div class="card-body">
                        <h5 class="card-title">{{$value->cages->type_cages->alias}} - {{$value->cages->number}} </h5>
                        <p class="card-text">Nama Pet: <span>{{$value->pets->name}}</span></p>
                        <p class="card-text">Jenis Pet: <span>{{$value->pets->typePets->name}}</span></p>
                        <p class="card-text">Tanggal Masuk: <span>{{ \Carbon\Carbon::parse($value->start_at)->translatedFormat('d F Y')}}</span></p>
                        <p class="card-text">Tanggal Keluar: <span>{{ \Carbon\Carbon::parse($value->end_at)->translatedFormat('d F Y')}}</span></p>
                        <button class="btn btn-gradient-primary btn-sm" value="{{$value->id}}" id="monit-data"><i class="fa-solid fa-house-medical"></i></button>                        </div>
                    </div>
                </div>
                @endforeach
            </div>
          </section>
        </div>
      </div>
    </div>
</div>
</section>
@endsection