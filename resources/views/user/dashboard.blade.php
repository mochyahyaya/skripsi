@extends('layouts.user')

@section('content')
<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">

  <div class="container">
  <div class="row">
      <div class="col-lg-6 d-lg-flex flex-lg-column justify-content-center align-items-stretch pt-5 pt-lg-0 order-2 order-lg-1" data-aos="fade-up">
      <div>
          <h1>Garden Petshop & Petclinic</h1>
          <h2>Melayani Hewan Peliharaan Anda Dengan Sepenuh Hati</h2>
      </div>
      </div>
      <div class="col-lg-6 d-lg-flex flex-lg-column align-items-stretch order-1 order-lg-2 hero-img" data-aos="fade-up">
      <img src={!! asset('Appland/assets/img/bg-1.png') !!} class="img-fluid" alt="">
      </div>
  </div>
  </div>

</section><!-- End Hero -->

<section id="features" class="features">
    <div class="container">

      <div class="section-title">
        <h2>Layanan Kami</h2>
        <p>Garden Petshop & PetClinic</p>
      </div>

      <div class="row no-gutters">
        <div class="col-xl-7 d-flex align-items-stretch order-2 order-lg-1">
          <div class="content d-flex flex-column justify-content-center">
            <div class="row">
              <div class="col-md-6 icon-box" data-aos="fade-up">
                <i class="bx bx-receipt"></i>
                <h4>Grooming Pet</h4>
                <p>Membersihkan dan merawat hewan peliharaan Anda dari kutu dan jamur</p>
              </div>
              <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="100">
                <i class="bx bx-cube-alt"></i>
                <h4>Pet Hotel</h4>
                <p>Tempat yang aman dan nyaman untuk jasa penitipan hewan kesayangan Anda</p>
              </div>
              <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="200">
                <i class="bx bx-images"></i>
                <h4>Breeding Pet</h4>
                <p>Perkawinan hewan dengan jantan yang memiliki ras bagus</p>
              </div>
              <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="300">
                <i class="bx bx-id-card"></i>
                <h4>Konsultasi Dokter</h4>
                <p>Konsultasi dengan dokter yang sudah terpecaya</p>
              </div>
            </div>
          </div>
        </div>
        <div class="image col-xl-5 d-flex align-items-stretch justify-content-center order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
          <img src={!! asset('Appland/assets/img/about-1.png') !!} class="img-fluid" alt="">
        </div>
      </div>

    </div>
</section><!-- End App Features Section -->

  <!-- ======= Details Section ======= -->
<section id="hotels" class="details section-bg">
  <div class="container">

    <div class="row content">
      <div class="col-md-4" data-aos="fade-right">
        <img src={!! asset('Appland/assets/img/about-6.png') !!} class="img-fluid" alt="">
      </div>
      <div class="col-md-8 pt-4" data-aos="fade-up">
        <h3>Titipkan Hewan Kesayangan Anda Disini</h3>
        <p class="fst-italic">
          Penginapan pet murah yang menjamin keselamatan dan kenyamanan bagi pet kesayangan anda.
        </p>
        <ul>
          <li><i class="bi bi-check"></i> Makan 3x Sehari</li>
          <li><i class="bi bi-check"></i> Selalu dalam pengawasan</li>
          <li><i class="bi bi-check"></i> Vitamin & Cemilan*</li>
        </ul>
        <p>
          <button type="button" class="get-started-btn btn btn-outline-primary rounded-pill" data-toggle="modal" data-target="#modal-create-hotels">
            Titipkan Sekarang
          </button>
        </p>
      </div>
    </div>

  </div>
</section><!-- End Details Section -->

<!-- ======= Pricing Section ======= -->
<section id="grooms" class="pricing">
  <div class="container">

    <div class="section-title">
      <h2>Groom</h2>
      <p>Pilihan Grooming</p>
    </div>

    <div class="row no-gutters">

      <div class="col-lg-4 box" data-aos="fade-right">
        <h3>Jamur</h3>
        <h4>35.000</h4>
        <ul>
          <li><i class="bx bx-check"></i> Nail Triming</li>
          <li><i class="bx bx-check"></i> Hair Cut / Hair Shave</li>
          <li><i class="bx bx-check"></i> Anti Tick Shampoo</li>
          <li><i class="bx bx-check"></i> Tick Treatment</li>
        </ul>
          <button type="button" class="get-started-btn btn btn-outline-primary" data-toggle="modal" data-target="#modal-create-grooms">
            Groom
          </button>
      </div>

      <div class="col-lg-4 box featured" data-aos="fade-up">
        <h3>Kutu</h3>
        <h4>40.000</h4>
        <ul>
          <li><i class="bx bx-check"></i> Nail Triming </li>
          <li><i class="bx bx-check"></i> Hair Cut / Hair Shave</li>
          <li><i class="bx bx-check"></i> Anti Mold Shampoo</li>
          <li><i class="bx bx-check"></i> Anti Mold Powder</li>
          <li><i class="bx bx-check"></i> Mold Treatment</li>
        </ul>
        <button type="button" class="get-started-btn btn btn-outline-primary" data-toggle="modal" data-target="#modal-create-grooms">
          Groom
        </button>
      </div>

      <div class="col-lg-4 box" data-aos="fade-left">
        <h3>Lengkap</h3>
        <h4>50.000</h4>
        <ul>
          <li><i class="bx bx-check"></i> Nail Triming</li>
          <li><i class="bx bx-check"></i> Hair Cut / Hair Shave</li>
          <li><i class="bx bx-check"></i> Anti Mold & Tick Shampoo</li>
          <li><i class="bx bx-check"></i> Anti Mold Powder</li>
          <li><i class="bx bx-check"></i> Tick Treatment</li>
          <li><i class="bx bx-check"></i> Mold Treatment</li>
        </ul>
        <button type="button" class="get-started-btn btn btn-outline-primary" data-toggle="modal" data-target="#modal-create-grooms">
          Groom
        </button>
      </div>

    </div>

  </div>
</section><!-- End Pricing Section -->

<!-- ======= Gallery Section ======= -->
<section id="breeds" class="gallery section-bg">
  <div class="container" data-aos="fade-up">
    <div class="section-title">
      <h2>Gallery Pet Breeding</h2>
      <p class="item-center">
        <button class="btn btn-outline-primary rounded-pill" data-toggle="modal" data-target="#modal-create-breeds">
          Breeding
        </button>
      </p>
    </div>
  </div>

  <div class="container-fluid" data-aos="fade-up">
    <div class="gallery-slider swiper">
        <div class="swiper-wrapper">
        @foreach ($pets as $value)
        <div class="swiper-slide">
            <a href="{!! asset('images/featured_image/'.$value->filename) !!}" class="gallery-lightbox" data-gall="gallery-carousel">
            <img src="{!! asset('images/featured_image/'.$value->filename) !!}" class="img-fluid m-3" style="height: 500px; width: 400px" alt="">
            </a>
            <div class="img-fluid m-3">{{$value->name}}</div>
        </div>
        @endforeach
        </div>
      </div>
      <div class="swiper-pagination"></div>
    </div>

</section><!-- End Gallery Section -->

  <!-- ======= Testimonials Section ======= -->
  <section id="testimonials" class="testimonials">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Testimoni Pengunjung</h2>
      </div>

      <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
        <div class="swiper-wrapper">

          @foreach ($testi as $value)
          <div class="swiper-slide">
            <div class="testimonial-item">
              {{-- <img src={!! asset('Appland/assets/img/testimonials/testimonials-1.jpg') !!} class="testimonial-img" alt=""> --}}
              <h3>{{$value->name}}</h3>
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                {{$value->messages}}
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
            </div>
          </div>
          @endforeach

        </div>
        <div class="swiper-pagination"></div>
      </div>

    </div>
  </section>
  <!-- End Testimonials Section -->

<!-- ======= Contact Section ======= -->
<section id="contact" class="contact section-bg">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Hubungin Kami</h2>
      <p>Jika terdapat keluhan atau masukkan , silahkan hubungi kami disini</p>
    </div>

    <div class="row">

      <div class="col-lg-6">
        <div class="row">
          <div class="col-lg-6 info">
            <i class="bx bx-map"></i>
            <h4>Alamat</h4>
            <p>Jl. Raya Jatiwaringin No.102 ,<br>RT.005/RW.002</p>
          </div>
          <div class="col-lg-6 info">
            <i class="bx bx-phone"></i>
            <h4>Telepon</h4>
            <p>+021 1345 688<br>+021 4452 123</p>
          </div>
          <div class="col-lg-6 info">
            <i class="bx bx-envelope"></i>
            <h4>Email</h4>
            <p>gardenpetshop@gmail.com</p>
          </div>
          <div class="col-lg-6 info">
            <i class="bx bx-time-five"></i>
            <h4>Jam Pelayanan</h4>
            <p>Sen - Jum : 08.00 - 20.00<br>Sab - Minggu: 09.00 - 19.30 </p>
          </div>
        </div>
      </div>

      <div class="col-lg-6">
        <form action="" method="" role="" class="php-email-form" data-aos="fade-up">
          <div class="form-group">
            <input placeholder="Nama Anda" type="text" name="name" class="form-control" id="name" required>
          </div>
          <div class="form-group mt-3">
            <input placeholder="Email Anda" type="email" class="form-control" name="email" id="email" required>
          </div>
          <div class="form-group mt-3">
            <select name="subject" id="subject" class="form-control">
              <option value="" selected disabled>--Keluhan/Masukan--</option>
              <option value="Keluhan">Keluhan</option>
              <option value="Masukan">Masukan</option>
            </select>
          </div>
          <div class="form-group mt-3">
            <textarea placeholder="Pesan" class="form-control" id="messages" name="messages" rows="5" required></textarea>
          </div>
          <div class="my-3">
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Your message has been sent. Thank you!</div>
          </div>
          <div class="text-center"><button type="submit" id="btn-testi-submit">Kirim Pesan</button></div>
        </form>
      </div>

    </div>

  </div>
</section><!-- End Contact Section -->

{{-- Modal Create Breeding --}}
<div class="modal fade" id="modal-create-breeds">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header">
              <h6 class="modal-title">Breeding</h6>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <form action="" method="post" class="forms-sample">
              @csrf
              <div class="modal-body">
                  <div class="alert alert-primary" role="alert">
                    Biaya yang akan dikenakan sebesar Rp 25.000 untuk semalam <br>
                    Biaya tidak termasuk tambahan lain. <br>
                    Batas waktu sampai dengan betina hamil.
                  </div>
                  <div class="row">
                      <div class="forms-group">
                          <label for="petname" class="col-form-label">Nama Pet</label>
                          <select id="petnameBreeds" class="form-control select2bs4" name="petname">
                            <option value="" selected disabled>--Pilih Nama Pet--</option>
                            @foreach ($petsBreeds as $value)
                                <option value="{{$value->id}}">{{$value->name}}</option>
                            @endforeach
                        </select>
                      </div>
                  </div>
                  <div class="row">
                    <div class="forms-group">
                        <label for="petMale" class="col-form-label">Nama Jantan</label>
                        <select id="petMale" class="form-control select2bs4" name="petMale">
                          <option value="" selected disabled>--Pilih Nama Pet--</option>
                          @foreach ($petAdmin as $value)
                              <option value="{{$value->name}}">{{$value->name}}</option>
                          @endforeach
                      </select>
                    </div>
                </div>
                <div class="row">
                  <div class="forms-group">
                      <label for="start_at" class="col-form-label">Tanggal Masuk</label>
                      <input type="text" placeholder="dd/mm/yyyy" name="start_at" id="start_at_breeds" class="form-control">
                  </div>
                </div>
              </div>
              <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-gradient-light btn-fw close" data-dismiss="modal">Kembali</button>
                  <button type="submit" class="btn btn-primary create_breeds">Simpan</button>
              </div>
          </form>
      </div>
  </div>
</div>

{{-- Modal Create Grooms --}}
<div class="modal fade" id="modal-create-grooms">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header">
              <h6 class="modal-title">Grooming</h6>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <form action="" method="post" class="forms-sample">
              @csrf
              <div class="modal-body">
                  <div class="row">
                      <div class="form-group">
                          <label for="petname" class="col-form-label">Nama Pet</label>
                          <select id="petname" name="petname" class="form-control select2bs4">
                            <option value="" selected disabled>--Pilih Nama Pet--</option>
                            @foreach ($petsGrooms as $value)
                                <option value="{{$value->id}}">{{$value->name}}</option>
                            @endforeach
                        </select>
                      </div>
                  </div>
                  <div class="row">
                    <div class="form-group">
                        <label for="service" class="col-form-label">Jenis Grooming</label>
                        <select id="service" name="service" class="form-control select2bs4">
                          <option value="" selected disabled>--Pilih Grooming--</option>
                          <option value="Lengkap">Lengkap</option>
                          <option value="Jamur">Jamur</option>
                          <option value="Kutu">Kutu</option>
                      </select>
                    </div>
                  </div>
                  <div>
                    <input type="hidden" name="price" id="price">
                  </div>
                </div>
              <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-gradient-light btn-fw close" data-dismiss="modal">Kembali</button>
                  <button type="submit" class="btn btn-primary create_grooms">Simpan</button>
              </div>
          </form>
      </div>
  </div>
</div>

{{-- Modal Create Hotels --}}
<div class="modal fade" id="modal-create-hotels">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header">
              <h6 class="modal-title">Hotels</h6>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <form action="" method="post" class="forms-sample">
              @csrf
              <div class="modal-body">
                <div class="alert alert-primary" role="alert">
                  Biaya yang akan dikenakan sebesar Rp 20.000 untuk semalam <br>
                  Biaya tidak termasuk tambahan lain.
                </div>
                  <div class="row">
                      <div class="forms-group">
                          <label for="petnameHotels" class="col-form-label">Nama Pet</label>
                          <select id="petnameHotels" class="form-control select2bs4" name="petname">
                            <option value="" selected disabled>--Pilih Nama Pet--</option>
                            @foreach ($petsHotels as $value)
                                <option value="{{$value->id}}">{{$value->name}}</option>
                            @endforeach
                        </select>
                      </div>
                  </div>
                  <div class="row">
                    <div class="form-group">
                        <label for="service" class="col-form-label">Tanggal Masuk</label>
                        <input type="text" placeholder="dd/mm/yyyy" name="start_at" id="start_at" class="form-control"> 
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group">
                        <label for="service" class="col-form-label">Tanggal Keluar</label>
                        <input type="text" placeholder="dd/mm/yyyy" name="end_at" id="end_at" class="form-control">
                    </div>
                  </div>
              <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-gradient-light btn-fw close" data-dismiss="modal">Kembali</button>
                  <button type="submit" class="btn btn-primary create_hotels">Simpan</button>
              </div>
          </form>
      </div>
  </div>
</div>

{{-- Modal Galery--}}
<div class="modal fade" id="modal-galery">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header">
              <h6 class="modal-title">Hotels</h6>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <form action="" method="post" class="forms-sample">
              @csrf
              <div class="modal-body">
                <div class="alert alert-primary" role="alert">
                  Biaya yang akan dikenakan sebesar Rp 20.000 untuk semalam <br>
                  Biaya tidak termasuk tambahan lain.
                </div>
                  <div class="row">
                      <div class="forms-group">
                          <label for="petname" class="col-form-label">Nama Pet</label>
                          <select id="petnameHotels" class="form-control select2bs4" name="petname">
                            <option value="" selected disabled>--Pilih Nama Pet--</option>
                            @foreach ($petsHotels as $value)
                                <option value="{{$value->id}}">{{$value->name}}</option>
                            @endforeach
                        </select>
                      </div>
                  </div>
                  <div class="row">
                    <div class="form-group">
                        <label for="service" class="col-form-label">Tanggal Masuk</label>
                        <input type="text" placeholder="dd/mm/yyyy" name="start_at" id="start_at" class="form-control"> 
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group">
                        <label for="service" class="col-form-label">Tanggal Keluar</label>
                        <input type="text" placeholder="dd/mm/yyyy" name="end_at" id="end_at" class="form-control">
                    </div>
                  </div>
              <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-gradient-light btn-fw close" data-dismiss="modal">Kembali</button>
                  <button type="submit" class="btn btn-primary create_hotels">Simpan</button>
              </div>
          </form>
      </div>
  </div>
</div>

@endsection
@push('scripts')
  <script>
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $(document).ready( function () {
      $('#start_at').datepicker({
        dateFormat: 'yy-mm-dd',
        minDate: 0
      });
      $('#end_at').datepicker({
        dateFormat: 'yy-mm-dd',
        minDate: +1
      });

      $('#start_at_breeds').datepicker({
        dateFormat: 'yy-mm-dd',
        minDate: 0
      });

    });

    $(document).ready(function (e) {
      $(document).on('click', '.create_grooms', function (e) {
        e.preventDefault();

        var price = $('#service').val();
        if(price == 'Lengkap'){
          $('#price').val('50000');
        } else if (price == 'Kutu' ) {
          $('#price').val('40000');
        } else {
          $('#price').val('35000')
        }

        var data = {
            'petname': $('#petname').val(),
            'service': $('#service').val(),
            'price': $('#price').val(),
            'status': 'Diproses',
            'pickup' : 'Ya', 
            'service_id': 1
        }

        $.ajax({
            type: "POST",
            url: "{{ route('user/userGroomsStore') }}",
            data: data,
            dataType: "json",
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
            complete: function(err){
                $('.create_grooms').text('Simpan').removeAttr('disabled')
                $('#petname').val(null).trigger('change');
                $('#service').val(null).trigger('change');
                $('#username').val(null).trigger('change');
                $('#modal-create-grooms .close').click();
            },
            error: function (err) {
              if (err.status == 422) {
                $.each(err.responseJSON.errors, function (i, error) {
                    var el = $(document).find('[name="'+i+'"]');
                    el.after($('<span style="color: red;">'+error[0]+'</span>'));
                });
                $('.create_grooms').text('Simpan').removeAttr('disabled')
              }
            }
        });
      });

      $(document).on('click', '.create_hotels', function (e) {
          e.preventDefault();

          $(this).text('Progress....').attr('disabled', 'disabled')

          var data = {
              'petname': $('#petnameHotels').val(),
              'service': $('#service').val(),
              'start_at': $('#start_at').val(),
              'end_at': $('#end_at').val(),
              'status': 'Dalam Kandang',
              'pickup' : 'Ya',
              'service_id': 2
          }

          $.ajax({
              type: "POST",
              url: "{{ route('user/userHotelsStore') }}",
              data: data,
              dataType: "json",
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
              complete: function(){
                  $('.create_hotels').text('Simpan').removeAttr('disabled');
                  $('#username').val(null).trigger('change');
                  $('#petname').val(null).trigger('change');
                  $('#start_at').val('');
                  $('#end_at').val('');
                  $('#modal-create-hotels .close').click();
                  fetch();
              },
              error: function (err) {
              if (err.status == 422) {
                  $.each(err.responseJSON.errors, function (i, error) {
                      var el = $(document).find('[name="'+i+'"]');
                      el.after($('<span style="color: red;">'+error[0]+'</span>'));
                  });
                  $('.create_hotels').text('Simpan').removeAttr('disabled')
              }
            }
          });
      });

      $(document).on('click', '.create_breeds', function (e) {
            e.preventDefault();

            $(this).text('Progress....').attr('disabled', 'disabled')

            var data = {
              'petname': $('#petnameBreeds').val(),
              'petmale': $('#petMale').val(),
              'start_at': $('#start_at_breeds').val(),
              'status': 'Proses',
              'pickup' : 'Ya',
              'service_id': 3
            }

            $.ajax({
                type: "POST",
                url: "{{ route('user/userBreedsStore') }}",
                data: data,
                dataType: "json",
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
                complete: function(){
                    $('.create_breeds').text('Simpan').removeAttr('disabled');
                    $('#username').val(null).trigger('change');
                    $('#petname').val(null).trigger('change');
                    $('#start_at').val('');
                    $('#end_at').val('');
                    $('#modal-create-breeds .close').click();
                },
                error: function (err) {
                if (err.status == 422) {
                    $.each(err.responseJSON.errors, function (i, error) {
                        var el = $(document).find('[name="'+i+'"]');
                        el.after($('<span style="color: red;">'+error[0]+'</span>'));
                    });
                    $('.create_breeds').text('Simpan').removeAttr('disabled')
                }
                }
            });
      });

      $(document).on('click', '#btn-testi-submit', function (e) {
          e.preventDefault();

          $(this).text('Progress....').attr('disabled', 'disabled')

          var data = {
              'name': $('#name').val(),
              'email': $('#email').val(),
              'subject': $('#subject').val(),
              'messages': $('#messages').val(),
          }

          $.ajax({
              type: "POST",
              url: "{{ route('user/userTestimonialsStore') }}",
              data: data,
              dataType: "json",
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
              complete: function(){
                  $('#btn-testi-submit').text('Simpan').removeAttr('disabled');
                  $('#name').val('');
                  $('#email').val('');
                  $('#subject').val('');
                  $('#messages').val('');
                  $('#modal-create-hotels .close').click();
                  fetch();
              },
              error: function (err) {
              if (err.status == 422) {
                  $.each(err.responseJSON.errors, function (i, error) {
                      var el = $(document).find('[name="'+i+'"]');
                      el.after($('<span style="color: red;">'+error[0]+'</span>'));
                  });
                  $('#btn-testi-submit').text('Simpan').removeAttr('disabled')
              }
            }
          });
      });
    });
  </script>
@endpush