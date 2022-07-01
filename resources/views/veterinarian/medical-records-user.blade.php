@extends('layouts.veterinarian')

@section('content')
<div class="container">
    <div class="row">
        @foreach ($users as $value)
        <div id="card" class="col-sm">
            <div class="card my-3" >
                <div class="card-body">
                    <h4 class="card-title">{{$value->name}}</h4>
                    <h6 class="card-subtitle mb-2 text-muted">{{$value->email}}</h6>
                    <a href="{{route('veterinarian/medicalRecordPets', $value->id)}}" class="btn btn-primary">Lihat Hewan</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
              
          <!-- Optional JavaScript -->
          <!-- jQuery first, then Popper.js, then Bootstrap JS --> 
@endsection