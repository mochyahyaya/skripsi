@extends('layouts.user')

@section('content')
<style>
    body{margin-top:20px;
    color: #9b9ca1;
    }
    .bg-secondary-soft {
        background-color: rgba(208, 212, 217, 0.1) !important;
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
    .file-upload .square {
        height: 250px;
        width: 250px;
        margin: auto;
        vertical-align: middle;
        border: 1px solid #e5dfe4;
        background-color: #fff;
        border-radius: 5px;
    }
    .text-secondary {
        --bs-text-opacity: 1;
        color: rgba(208, 212, 217, 0.5) !important;
    }
    .btn-success-soft {
        color: #28a745;
        background-color: rgba(40, 167, 69, 0.1);
    }
    .btn-danger-soft {
        color: #dc3545;
        background-color: rgba(220, 53, 69, 0.1);
    }
    .form-control {
    display: block;
    width: 100%;
    padding: 0.5rem 1rem;
    font-size: 0.9375rem;
    font-weight: 400;
    line-height: 1.6;
    color: #29292e;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #e5dfe4;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    border-radius: 5px;
    -webkit-transition: border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
    transition: border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
    }
</style>
<section class="inner-page">
    <div class="container">
        <div class="row">
                <div class="col-12">
                    <!-- Page title -->
                    <div class="my-5">
                        <h3>Profil</h3>
                        <hr>
                    </div>
                    <!-- Form START -->
                    <form class="file-upload" id="update-profile" enctype="multipart/form-data">
                        <div class="row mb-5 gx-5">
                            <!-- Contact detail -->
                            <div class="col-xxl-12 mb-5 mb-xxl-0">
                                <div class="bg-secondary-soft px-4 py-5 rounded">
                                    <div class="row g-3">
                                        @foreach ($user as $value)
                                        <h4 class="mb-4 mt-0">Informasi Umum</h4>
                                        <!-- First Name -->
                                        <div class="col-md-6">
                                            <label class="form-label">Nama *</label>
                                            <input type="text" class="form-control" placeholder="" id="name" name="name" aria-label="First name" value="{{$value->name}}">
                                        </div>
                                        <!-- Phone number -->
                                        <div class="col-md-6">
                                            <label class="form-label">Nomor Telepon *</label>
                                            <input type="text" class="form-control" placeholder="" id="phone_number" aria-label="Phone number" value="{{$value->phone_number}}" name="phone_number">
                                        </div>
                                        <!-- Email -->
                                        <div class="col-md-6">
                                            <label for="inputEmail4" class="form-label">Email *</label>
                                            <input type="email" class="form-control" id="email" value="{{$value->email}}" name="email">
                                        </div>
                                        <!-- Skype -->
                                        <div class="col-md-6">
                                            <label class="form-label">Alamat *</label>
                                            <input type="text" class="form-control" placeholder="" aria-label="Phone number" value="{{$value->address}}" name="address">
                                        </div>
                                    </div> <!-- Row END -->
                                    @endforeach
                                </div>
                            </div>
                            <!-- Upload profile -->
                            <div class="col-xxl-12">
                                <div class="bg-secondary-soft px-4 py-5 rounded">
                                    <div class="row g-3">
                                        <h4 class="mb-4 mt-0">Upload Foto Profile Kamu</h4>
                                        <div class="text-center">
                                            @foreach ($user as $value)            
                                                <!-- Image upload -->
                                                <div class="square position-relative display-2 mb-3">
                                                    {{-- <i class="fas fa-fw fa-user position-absolute top-50 start-50 translate-middle text-secondary"></i> --}}
                                                    <img src="{{asset('images/user_featured_image/'.$value->photo)}}" alt="" class="fas fa-fw fa-user position-absolute top-50 start-50 translate-middle text-secondary" style="max-height: 200px; max-width:200px">
                                                </div>
                                                <!-- Button -->
                                                <input type="file" name="file" >
                                                <label class="btn btn-success-soft btn-block" for="customFile">Upload</label>
                                                <!-- Content -->
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- Row END -->
        
                        <!-- Social media detail -->
                        <div class="row mb-5 gx-5">
        
                            <!-- change password -->
                            <div class="col-xxl-12">
                                <div class="bg-secondary-soft px-4 py-5 rounded">
                                    <div class="row g-3">
                                        <h4 class="my-4">Change Password</h4>
                                        @foreach ($user as $value)
                                        <!-- Old password -->
                                        <div class="col-md-6">
                                            <label for="exampleInputPassword1" class="form-label">Passwor Lama *</label>
                                            <input type="password" class="form-control" id="old_password" name="old_password">
                                        </div>
                                        @endforeach
                                        <!-- New password -->
                                        <div class="col-md-6">
                                            <label for="exampleInputPassword2" class="form-label">Password Baru *</label>
                                            <input type="password" class="form-control" id="new_password" name="new_password">
                                        </div>
                                        <!-- Confirm password -->
                                        <div class="col-md-12">
                                            <label for="exampleInputPassword3" class="form-label">Konfirmasi Password *</label>
                                            <input type="password" class="form-control" id="confirm_password" name="confirm_password">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- Row END -->
                        <!-- button -->
                        <div class="gap-3 d-md-flex justify-content-md-end text-center mb-5">
                            <button type="submit" class="btn btn-primary btn-lg btn-update">Update profile</button>
                        </div>
                    </form> <!-- Form END -->
                </div>
            </div>
    </div>
</section>
@endsection
@push('scripts')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function () {
            $("form#update-profile").submit(function(e) {
                e.preventDefault();    
                var formData = new FormData(this);
                formData.append('_method', 'put')
                // var data =  $(this).serialize()
                // console.log(formData);
                $.ajax({
                    url: "{{route('user/profileUpdate')}}",
                    method  : 'post',
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                        })
                        Toast.fire({
                        icon: data.status,
                        title: data.message
                        })
                    },
                });
            });
        })
    </script>
@endpush