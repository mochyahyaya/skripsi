@extends('layouts.veterinarian')

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
        <a href="{{route('veterinarian/medicalRecordUsers')}}">
          <div class="card-body">
            <img src="{!!asset('PurpleAdmin/assets/images/dashboard/circle.svg')!!}" class="card-img-absolute" alt="circle-image" />
            <h4 class="font-weight-normal mb-3">Rekam Medis <i class="mdi mdi-chart-line mdi-24px float-right"></i>
            </h4>
            <h2 class="mb-5"></h2>
            {{-- <h6 class="card-text">Increased by 60%</h6> --}}
          </div>
        </a>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-12 grid-margin">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Recent Tickets</h4>
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th> # </th>
                  <th> Nama Pet </th>
                  <th> Nama Pemilik</th>
                  <th> Keperluan </th>
                  <th> Waktu Kunjungan</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($medical as $value)
                  <tr>
                    <td></td>
                    <td>
                      <img src="{!!asset('images/featured_image/'.$value->pets->filename)!!}" class="me-2" alt="image"> {{$value->pets->name}}
                    </td>
                    <td> {{$value->pets->users->name}}</td>
                    <td> {{$value->needed}} </td>
                    <td> {{ \Carbon\Carbon::parse($value->created_at)->locale('id')->format('d F Y')}} </td>
                  </tr>   
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
