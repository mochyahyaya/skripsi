@extends('layouts.admin')

@section('content')
<style>
  /* unvisited link */
  a:link {
    color: white;
  }
  
  /* visited link */
  a:visited {
    color: white;
  }
  
  /* mouse over link */
  a:hover {
    color: blue;
  }
  
  /* selected link */
  a:active {
    color: blue;
  }
  </style>
<div class="content-wrapper">
  <div class="page-header">
    <h3 class="page-title">
      <span class="page-title-icon bg-gradient-primary text-white me-2">
        <i class="mdi mdi-home"></i>
      </span> Dashboard
    </h3>
    <nav aria-label="breadcrumb">
      <ul class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">
          <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
        </li>
      </ul>
    </nav>
  </div>
  <div class="row">
    <div class="col-md-4 stretch-card grid-margin">
      <div class="card bg-gradient-danger card-img-holder text-white">
        <a href="{{route('admin/users')}}">
          <div class="card-body">
            <img src="{!!asset('PurpleAdmin/assets/images/dashboard/circle.svg')!!}" class="card-img-absolute" alt="circle-image" />
            <h4 class="font-weight-normal mb-3">Pengguna <i class="mdi mdi-chart-line mdi-24px float-right"></i>
            </h4>
            <h2 class="mb-5">{{$users}}</h2>
            {{-- <h6 class="card-text">Increased by 60%</h6> --}}
          </div>
        </a>
      </div>
    </div>
    <div class="col-md-4 stretch-card grid-margin">
      <div class="card bg-gradient-info card-img-holder text-white">
        <a href="{{route('admin/pets')}}">
          <div class="card-body">
            <img src="{!! asset('PurpleAdmin/assets/images/dashboard/circle.svg') !!}" class="card-img-absolute" alt="circle-image" />
            <h4 class="font-weight-normal mb-3">Hewan Peliharan <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
            </h4>
            <h2 class="mb-5">{{$pets}}</h2>
            {{-- <h6 class="card-text">Decreased by 10%</h6> --}}
          </div>
        </a>
      </div>
    </div>
    
    <div class="col-md-4 stretch-card grid-margin">
      <div class="card bg-gradient-success card-img-holder text-white">
        <a href="{{route('admin/cages')}}" class="font-weight-normal mb-3">
        <div class="card-body">
          <img src="{!!asset('PurpleAdmin/assets/images/dashboard/circle.svg')!!}" class="card-img-absolute" alt="circle-image" />
            <h4 class="font-weight-normal mb-3">Kandang <i class="mdi mdi-diamond mdi-24px float-right"></i>
            </h4>
            <h2 class="mb-5">{{$cages}}</h2>
            {{-- <h6 class="card-text">Increased by 5%</h6> --}}
          </div>
        </a>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-7 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="clearfix">
            <h4 class="card-title float-left">Laporan Bulanan</h4>
            <div id="visit-sale-chart-legend" class="rounded-legend legend-horizontal legend-top-right float-right"></div>
          </div>
          <canvas id="visit-sale-chart" class="mt-4"></canvas>
        </div>
      </div>
    </div>
    <div class="col-md-5 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Jumlah Transaksi</h4>
          <canvas id="traffic-chart"></canvas>
          <div id="traffic-chart-legend" class="rounded-legend legend-vertical legend-bottom-left pt-4"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-12 grid-margin">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Transaksi Terakhir</h4>
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th> # </th>
                  <th> Nama Pet </th>
                  <th> Service </th>
                  <th> Status </th>
                  <th> Update Terakhir </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($joins as $value)
                {{-- {{dd(count($value))}} --}}
                @for($i = 0; $i < count($value) ; $i++)
                @php
                  $indeks = 1;
                @endphp
                <tr>
                  <td>
                    {{$loop->index}}
                  </td>
                  <td>
                    <img src="{!!asset('PurpleAdmin/assets/images/faces/face1.jpg')!!}" class="me-2" alt="image"> {{$value[$i]->name}}
                  </td>
                  @if ($value[$i]->service_id == 1)
                    <td><span class="badge badge-success">Grooms</span></td>
                  @elseif($value[$i]->service_id == 2)
                    <td><span class="badge badge-danger">Hotels</span></td>
                  @else
                    <td><span class="badge badge-info">Breeds</span></td>
                  @endif
                  <td>{{$value[$i]->status}}</td>
                  <td>{{ \Carbon\Carbon::parse($value[$i]->created_at)->locale('id')->format('d M Y')}}</td>
                </tr>
                @endfor  
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>  
@endsection

@push('scripts')
@endpush
