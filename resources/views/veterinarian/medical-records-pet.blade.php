@extends('layouts.veterinarian')

@section('content')
<div class="content-wrapper">
    <div class="container">
        <div class="row">
            @foreach ($pets as $value)
            <div id="card" class="col-sm">
                <div class="card my-3" >
                    <div class="card-body">
                        <h4 class="card-title">{{$value->name}}</h4>
                        <img src="{!!asset('images/featured_image/'.$value->filename) !!}" style="max-width: 100px; max-height:100px" class="me-2 rounded-circle" alt="{{$value->name}}">
                        <h6 class="card-subtitle mb-2 text-muted">{{$value->typePets->name}}</h6>
                        <a href="{{route('veterinarian/medicalRecords', $value->id)}}" class="btn btn-primary">Lihat Hewan</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>            
@endsection