@extends('layouts.veterinarian')

@section('content')
<div class="container">
    <div class="row">
        @foreach ($pets as $value)
        <div id="card" class="col-sm">
            <div class="card my-3" >
                <div class="card-body">
                    <h4 class="card-title">{{$value->name}}</h4>
                    <img src="{!!asset('PurpleAdmin/assets/images/faces/face1.jpg')!!}" class="me-2 rounded-circle" alt="image">
                    <h6 class="card-subtitle mb-2 text-muted">{{$value->type_pet_id}}</h6>
                    <a href="{{route('veterinarian/medicalRecords', $value->id)}}" class="btn btn-primary">Lihat Hewan</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
              
          <!-- Optional JavaScript -->
          <!-- jQuery first, then Popper.js, then Bootstrap JS --> 
@endsection