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
          {{-- <canvas id="visit-sale-chart" class="mt-4"></canvas> --}}
          <canvas id="reportChart" height="100px"></canvas>
        </div>
      </div>
    </div>
    <div class="col-md-5 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Jumlah Transaksi</h4>
          <canvas id="transactionChart"></canvas>
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
<script type="text/javascript">
  
  var labels =  {{ Js::from($labels) }};
  var grooms =  {{ Js::from($grooms) }};
  var hotels =  {{ Js::from($hotels) }};
  var breeds =  {{ Js::from($breeds) }};

  var ctx = document.getElementById('reportChart').getContext("2d");

  var gradientStrokeViolet = ctx.createLinearGradient(0, 0, 0, 181);
  gradientStrokeViolet.addColorStop(0, 'rgba(218, 140, 255, 1)');
  gradientStrokeViolet.addColorStop(1, 'rgba(154, 85, 255, 1)');
  var gradientLegendViolet = 'linear-gradient(to right, rgba(218, 140, 255, 1), rgba(154, 85, 255, 1))';

  var gradientStrokeBlue = ctx.createLinearGradient(0, 0, 0, 360);
  gradientStrokeBlue.addColorStop(0, 'rgba(54, 215, 232, 1)');
  gradientStrokeBlue.addColorStop(1, 'rgba(177, 148, 250, 1)');
  var gradientLegendBlue = 'linear-gradient(to right, rgba(54, 215, 232, 1), rgba(177, 148, 250, 1))';

  var gradientStrokeRed = ctx.createLinearGradient(0, 0, 0, 300);
  gradientStrokeRed.addColorStop(0, 'rgba(255, 191, 150, 1)');
  gradientStrokeRed.addColorStop(1, 'rgba(254, 112, 150, 1)');
  var gradientLegendRed = 'linear-gradient(to right, rgba(255, 191, 150, 1), rgba(254, 112, 150, 1))';

  var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: labels,
        datasets: [
          {
            label: "GROOMS",
            borderColor: gradientStrokeViolet,
            backgroundColor: gradientStrokeViolet,
            hoverBackgroundColor: gradientStrokeViolet,
            legendColor: gradientLegendViolet,
            pointRadius: 0,
            fill: false,
            borderWidth: 1,
            fill: 'origin',
            data: grooms
          },
          {
            label: "BOARDS",
            borderColor: gradientStrokeRed,
            backgroundColor: gradientStrokeRed,
            hoverBackgroundColor: gradientStrokeRed,
            legendColor: gradientLegendRed,
            pointRadius: 0,
            fill: false,
            borderWidth: 1,
            fill: 'origin',
            data: hotels
          },
          {
            label: "BREEDS",
            borderColor: gradientStrokeBlue,
            backgroundColor: gradientStrokeBlue,
            hoverBackgroundColor: gradientStrokeBlue,
            legendColor: gradientLegendBlue,
            pointRadius: 0,
            fill: false,
            borderWidth: 1,
            fill: 'origin',
            data: breeds
          }
      ]
    },
    options: {
      responsive: true,
      legend: false,
      legendCallback: function(chart) {
        var text = []; 
        text.push('<ul>'); 
        for (var i = 0; i < chart.data.datasets.length; i++) { 
            text.push('<li><span class="legend-dots" style="background:' + 
                      chart.data.datasets[i].legendColor + 
                      '"></span>'); 
            if (chart.data.datasets[i].label) { 
                text.push(chart.data.datasets[i].label); 
            } 
            text.push('</li>'); 
        } 
        text.push('</ul>'); 
        return text.join('');
      },
      scales: {
          yAxes: [{
              ticks: {
                  display: false,
                  min: 0,
                  stepSize: 20,
                  max: 80
              },
              gridLines: {
                drawBorder: false,
                color: 'rgba(235,237,242,1)',
                zeroLineColor: 'rgba(235,237,242,1)'
              }
          }],
          xAxes: [{
              gridLines: {
                display:false,
                drawBorder: false,
                color: 'rgba(0,0,0,1)',
                zeroLineColor: 'rgba(235,237,242,1)'
              },
              ticks: {
                  padding: 20,
                  fontColor: "#9c9fa6",
                  autoSkip: true,
              },
              categoryPercentage: 0.5,
              barPercentage: 0.5
          }]
        }
      },
      elements: {
        point: {
          radius: 0
        }
      }
  })
  $("#visit-sale-chart-legend").html(myChart.generateLegend());
</script>

<script type="text/javascript">
      var groomsCount =  {{ Js::from($groomsCount) }};
      var hotelsCount =  {{ Js::from($hotelsCount) }};
      var breedsCount =  {{ Js::from($breedsCount) }};

      var gradientStrokeBlue = ctx.createLinearGradient(0, 0, 0, 181);
      gradientStrokeBlue.addColorStop(0, 'rgba(54, 215, 232, 1)');
      gradientStrokeBlue.addColorStop(1, 'rgba(177, 148, 250, 1)');
      var gradientLegendBlue = 'linear-gradient(to right, rgba(54, 215, 232, 1), rgba(177, 148, 250, 1))';

      var gradientStrokeRed = ctx.createLinearGradient(0, 0, 0, 50);
      gradientStrokeRed.addColorStop(0, 'rgba(255, 191, 150, 1)');
      gradientStrokeRed.addColorStop(1, 'rgba(254, 112, 150, 1)');
      var gradientLegendRed = 'linear-gradient(to right, rgba(255, 191, 150, 1), rgba(254, 112, 150, 1))';

      var gradientStrokeGreen = ctx.createLinearGradient(0, 0, 0, 300);
      gradientStrokeGreen.addColorStop(0, 'rgba(6, 185, 157, 1)');
      gradientStrokeGreen.addColorStop(1, 'rgba(132, 217, 210, 1)');
      var gradientLegendGreen = 'linear-gradient(to right, rgba(6, 185, 157, 1), rgba(132, 217, 210, 1))';      

      var trafficChartData = {
        datasets: [{
          data: [groomsCount, hotelsCount, breedsCount],
          backgroundColor: [
            gradientStrokeBlue,
            gradientStrokeGreen,
            gradientStrokeRed
          ],
          hoverBackgroundColor: [
            gradientStrokeBlue,
            gradientStrokeGreen,
            gradientStrokeRed
          ],
          borderColor: [
            gradientStrokeBlue,
            gradientStrokeGreen,
            gradientStrokeRed
          ],
          legendColor: [
            gradientLegendBlue,
            gradientLegendGreen,
            gradientLegendRed
          ]
        }
      ],
    
        // These labels appear in the legend and in the tooltips when hovering different arcs
        labels: [
          'Grooming',
          'Boarding',
          'Breeding',
        ]
      };
      var trafficChartOptions = {
        responsive: true,
        animation: {
          animateScale: true,
          animateRotate: true
        },
        legend: false,
        legendCallback: function(chart) {
          var text = []; 
          text.push('<ul>'); 
          for (var i = 0; i < trafficChartData.datasets[0].data.length; i++) { 
              text.push('<li><span class="legend-dots" style="background:' + 
              trafficChartData.datasets[0].legendColor[i] + 
                          '"></span>'); 
              if (trafficChartData.labels[i]) { 
                  text.push(trafficChartData.labels[i]); 
              }
              text.push('<span class="float-right">'+trafficChartData.datasets[0].data[i]+'</span>')
              text.push('</li>'); 
          } 
          text.push('</ul>'); 
          return text.join('');
        }
      };
      var trafficChartCanvas = $("#transactionChart").get(0).getContext("2d");
      var trafficChart = new Chart(trafficChartCanvas, {
        type: 'doughnut',
        data: trafficChartData,
        options: trafficChartOptions
      });
      $("#traffic-chart-legend").html(trafficChart.generateLegend());   
</script>
@endpush
