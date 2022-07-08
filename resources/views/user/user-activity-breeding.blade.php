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
    p, h4 {
        color: black
    }
</style>
<section class="inner-page">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="my-5">
          <h3>Aktivitas Breeding</h3>
          <hr>
        <div class="row mb-5 gx-5">
          <div class="col-xxl-12 mb-5 mb-xxl-0">
            <div class="card">
              <div class="card-header">
                  <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                      <a class="nav-link" href="{{route('user/userActivityGrooms')}}">Grooming</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{route('user/userActivityHotels')}}">Boarding</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link active" href="#">Breeding</a>
                    </li>
                  </ul>
                </div>
              <div class="card-body">
                <h4 class="card-title">List Aktivitas Breeding</h4>
                <section id="gallery">
                  <div class="row">
                    <div class="row no-gutters">
                        <div class="col-md-12 d-flex align-items-stretch order-2 order-lg-1">
                          <div class="content d-flex flex-column justify-content-center">
                            <div class="row">
                                @foreach ($breeds as $value)
                                {{-- {{dd(count($value))}} --}}
                                <div class="card">
                                    <div class="col-md-12">
                                    <i class="bx bx-receipt"></i>
                                    <h4>{{$value->name}} Pet</h4>
                                    <p>{{$value->petname}} || {{$value->pet_male}}</p>
                                    <p>Masuk: {{ \Carbon\Carbon::parse($value->start_at)->locale('id')->isoFormat('Do MMMM YYYY')}}</p>
                                    @if ($value->end_at == '0000-00-00')
                                        <p>Keluar: Masih Proses</p>
                                    @else
                                        <p>Keluar: {{ (\Carbon\Carbon::parse($value->end_at)->locale('id')->isoFormat('Do MMMM YYYY') ?? 'Masih Proses') }} </p>
                                    @endif
                                    @if ($value->status == 'Selesai')
                                      <p>
                                        <label for="status" class="badge badge-success">{{$value->status}}</label>
                                      </p>
                                    @else
                                      <p>
                                        <label for="status" class="badge badge-warning">{{$value->status}}</label>
                                      </p>
                                    @endif
                                    </div>
                                </div>
                                @endforeach
                            </div>
                          </div>
                        </div>
                      </div>
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