@extends('layouts.user')

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

@section('content')
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
  <section id="details" class="details section-bg">
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
    <section id="pricing" class="pricing">
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
  <section id="gallery" class="gallery section-bg">
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
          <div class="swiper-slide"><a href={!! asset('Appland/assets/img/gallery/gallery-1.png') !!} class="gallery-lightbox" data-gall="gallery-carousel"><img src={!! asset('Appland/assets/img/gallery/gallery-1.png') !!}  class="img-fluid" alt=""></a></div>
          <div class="swiper-slide"><a href={!! asset('Appland/assets/img/gallery/gallery-2.png') !!} class="gallery-lightbox" data-gall="gallery-carousel"><img src={!! asset('Appland/assets/img/gallery/gallery-2.png') !!}  class="img-fluid" alt=""></a></div>
          <div class="swiper-slide"><a href={!! asset('Appland/assets/img/gallery/gallery-3.png') !!} class="gallery-lightbox" data-gall="gallery-carousel"><img src={!! asset('Appland/assets/img/gallery/gallery-3.png') !!} class="img-fluid" alt=""></a></div>
          <div class="swiper-slide"><a href={!! asset('Appland/assets/img/gallery/gallery-4.png') !!} class="gallery-lightbox" data-gall="gallery-carousel"><img src={!! asset('Appland/assets/img/gallery/gallery-4.png') !!}  class="img-fluid" alt=""></a></div>
          <div class="swiper-slide"><a href={!! asset('Appland/assets/img/gallery/gallery-5.png') !!} class="gallery-lightbox" data-gall="gallery-carousel"><img src={!! asset('Appland/assets/img/gallery/gallery-5.png') !!}  class="img-fluid" alt=""></a></div>
          <div class="swiper-slide"><a href={!! asset('Appland/assets/img/gallery/gallery-6.png') !!} class="gallery-lightbox" data-gall="gallery-carousel"><img src={!! asset('Appland/assets/img/gallery/gallery-6.png') !!}  class="img-fluid" alt=""></a></div>
          <div class="swiper-slide"><a href={!! asset('Appland/assets/img/gallery/gallery-7.png') !!} class="gallery-lightbox" data-gall="gallery-carousel"><img src={!! asset('Appland/assets/img/gallery/gallery-7.png') !!} class="img-fluid" alt=""></a></div>
          <div class="swiper-slide"><a href={!! asset('Appland/assets/img/gallery/gallery-8.png') !!} class="gallery-lightbox" data-gall="gallery-carousel"><img src={!! asset('Appland/assets/img/gallery/gallery-8.png') !!}  class="img-fluid" alt=""></a></div>
          <div class="swiper-slide"><a href={!! asset('Appland/assets/img/gallery/gallery-9.png') !!} class="gallery-lightbox" data-gall="gallery-carousel"><img src={!! asset('Appland/assets/img/gallery/gallery-9.png') !!}  class="img-fluid" alt=""></a></div>
          <div class="swiper-slide"><a href={!! asset('Appland/assets/img/gallery/gallery-10.png') !!} class="gallery-lightbox" data-gall="gallery-carousel"><img src={!! asset('Appland/assets/img/gallery/gallery-10.png') !!}  class="img-fluid" alt=""></a></div>
          <div class="swiper-slide"><a href={!! asset('Appland/assets/img/gallery/gallery-11.png') !!} class="gallery-lightbox" data-gall="gallery-carousel"><img src={!! asset('Appland/assets/img/gallery/gallery-11.png') !!}  class="img-fluid" alt=""></a></div>
          <div class="swiper-slide">
            <a href={!! asset('Appland/assets/img/gallery/gallery-12.png') !!} class="gallery-lightbox" data-gall="gallery-carousel">
              <img src={!! asset('Appland/assets/img/gallery/gallery-12.png') !!} class="img-fluid" alt="">
            </a>
          </div>
        </div>
        <div class="swiper-pagination"></div>
      </div>
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

          <div class="swiper-slide">
            <div class="testimonial-item">
              <img src={!! asset('Appland/assets/img/testimonials/testimonials-1.jpg') !!} class="testimonial-img" alt="">
              <h3>Pengguna 1</h3>
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                Garden tempat yang bagus untuk menitipkan hewan peliharaan, gak nyesel nitipin disini.
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
            </div>
          </div>

          <div class="swiper-slide">
            <div class="testimonial-item">
              <img src={!! asset('Appland/assets/img/testimonials/testimonials-2.jpg') !!} class="testimonial-img" alt="">
              <h3>Pengguna 2</h3>
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                Bukan cuma pelayanannya yang bagus tapi juga harganya yang murah banget dibandingkan petshop lain
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
            </div>
          </div>

          <div class="swiper-slide">
            <div class="testimonial-item">
              <img src={!! asset('Appland/assets/img/testimonials/testimonials-3.jpg') !!} class="testimonial-img" alt="">
              <h3>Pengguna 3</h3>
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                Pelayanannya ramah dan baik banget
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
            </div>
          </div>

          <div class="swiper-slide">
            <div class="testimonial-item">
              <img src={!! asset('Appland/assets/img/testimonials/testimonials-4.jpg') !!} class="testimonial-img" alt="">
              <h3>Pengguna 4</h3>
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                Gak nyesel grooming disini, hasilnya bersih dan harum
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
            </div>
          </div>
        </div>
        <div class="swiper-pagination"></div>
      </div>

    </div>
  </section><!-- End Testimonials Section -->

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
          <form action="forms/contact.php" method="post" role="form" class="php-email-form" data-aos="fade-up">
            <div class="form-group">
              <input placeholder="Nama Anda" type="text" name="name" class="form-control" id="name" required>
            </div>
            <div class="form-group mt-3">
              <input placeholder="Email Anda" type="email" class="form-control" name="email" id="email" required>
            </div>
            <div class="form-group mt-3">
              <input placeholder="Keluhan/Masukan" type="text" class="form-control" name="subject" id="subject" required>
            </div>
            <div class="form-group mt-3">
              <textarea placeholder="Pesan" class="form-control" name="message" rows="5" required></textarea>
            </div>
            <div class="my-3">
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your message has been sent. Thank you!</div>
            </div>
            <div class="text-center"><button type="submit">Kirim Pesan</button></div>
          </form>
        </div>

      </div>

    </div>
  </section><!-- End Contact Section -->

  {{-- Modal Create Grooms --}}
  <div class="modal fade" id="modal-create-grooms">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Tambah Data</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="post" class="forms-sample">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="forms-group">
                            <label for="petname" class="col-form-label">Nama Pet</label>
                            <select id="petname" class="form-control select2bs4" name="petname">
                              <option value="" selected disabled>--Pilih Nama Pet--</option>
                              @foreach ($pets as $value)
                                  <option value="{{$value->id}}">{{$value->name}}</option>
                              @endforeach
                          </select>
                        </div>
                    </div>
                    <div class="row">
                      <div class="forms-group">
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
                    <button type="submit" class="btn btn-primary tambah_data">Simpan</button>
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
                <h6 class="modal-title">Tambah Data</h6>
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
                            <select id="petname" class="form-control select2bs4" name="petname">
                              <option value="" selected disabled>--Pilih Nama Pet--</option>
                              @foreach ($pets as $value)
                                  <option value="{{$value->id}}">{{$value->name}}</option>
                              @endforeach
                          </select>
                        </div>
                    </div>
                    <div class="row">
                      <div class="forms-group">
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
                    <button type="submit" class="btn btn-primary tambah_data">Simpan</button>
                </div>
            </form>
        </div>
    </div>
  </div>

  {{-- Modal Create Breeding --}}
  <div class="modal fade" id="modal-create-breeds">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Tambah Data</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="post" class="forms-sample">
                @csrf
                <div class="modal-body">
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                      Biaya yang akan dikenakan sebesar Rp 25.000 untuk semalam <br>
                      Biaya tidak termasuk tambahan lain. <br>
                      Batas waktu sampai dengan betina hamil.
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="row">
                        <div class="forms-group">
                            <label for="petname" class="col-form-label">Nama Pet</label>
                            <select id="petname" class="form-control select2bs4" name="petname">
                              <option value="" selected disabled>--Pilih Nama Pet--</option>
                              @foreach ($pets as $value)
                                  <option value="{{$value->id}}">{{$value->name}}</option>
                              @endforeach
                          </select>
                        </div>
                    </div>
                    <div class="row">
                      <div class="forms-group">
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
                    <button type="submit" class="btn btn-primary tambah_data">Simpan</button>
                </div>
            </form>
        </div>
    </div>
  </div>
@endsection