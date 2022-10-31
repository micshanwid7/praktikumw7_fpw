@php
    $page = "home";
@endphp

@extends('homelayout')

@section('content')
@if ($userlogin != null)
    @php
        $page = "hotel1";
    @endphp

@endif
@isset($id)
    <h1>{{ $message }}</h1>
@endisset
<section class="ftco-section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="intro ftco-animate">
                    <h3><span>01</span> Travel</h3>
                    <p>Bepergian dengan aman dan nyaman.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="intro ftco-animate">
                    <h3><span>02</span> Experience</h3>
                    <p>Buat momen dan pengalaman yang menarik untuk dikenang.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="intro ftco-animate">
                    <h3><span>03</span> Relax</h3>
                    <p>Buang segala aktifitas di hari kerja. Nikmati hari-hari berlibur bersama.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-about d-md-flex">
    <div class="one-half img" style="background-image: url(home/images/MyLogo.jpg);"></div>
    <div class="one-half ftco-animate">
    <div class="heading-section ftco-animate ">
      <h2 class="mb-4">The Best Lodging Travel Agency</h2>
    </div>
    <div>
              <p>Agen travel penginapan andalan, terlengkap, dan terkemuka nomor 1 di Jawa Timur.</p>
          </div>
    </div>
</section>

<section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url(images/bg_1.jpg);" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="row">
              <div class="col-md-6 d-flex justify-content-center counter-wrap ftco-animate">
                <div class="block-18 text-center">
                  <div class="text">
                    <strong class="number" data-number="1000">0</strong>
                    <span>Happy Customers</span>
                  </div>
                </div>
              </div>
              <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                <div class="block-18 text-center">
                  <div class="text">
                    <strong class="number" data-number="100">0</strong>
                    <span>Hotels</span>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
    </div>
</section>

<section class="ftco-section testimony-section">
    <div class="container">
      <div class="row justify-content-center mb-5 pb-3">
        <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
          <h2 class="mb-4">Testimoni</h2>
          <p>Berikut testimoni dari beberapa pengguna agen travel dan penginapan kami</p>
        </div>
      </div>
      <div class="row ftco-animate">
        <div class="col-md-12">
          <div class="carousel-testimony owl-carousel ftco-owl">
            <div class="item">
              <div class="testimony-wrap p-4 pb-5">
                <div class="user-img mb-5" style="background-image: url(home/images/person_1.jpg)">
                  <span class="quote d-flex align-items-center justify-content-center">
                    <i class="icon-quote-left"></i>
                  </span>
                </div>
                <div class="text">
                  <p class="mb-5">Saya merasa sangat terpuaskan, segala sesuatu yang menyangkut liburan keluarga saya telah diatur semua oleh Gouhuy Jatim Park 3. Mantap!</p>
                  <p class="name">Michael Shan</p>
                  <span class="position">Web Developer</span>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="testimony-wrap p-4 pb-5">
                <div class="user-img mb-5" style="background-image: url(home/images/person_1.jpg)">
                  <span class="quote d-flex align-items-center justify-content-center">
                    <i class="icon-quote-left"></i>
                  </span>
                </div>
                <div class="text">
                  <p class="mb-5">Saya merasa sangat terpuaskan, segala sesuatu yang menyangkut liburan keluarga saya telah diatur semua oleh Gouhuy Jatim Park 3. Mantap!</p>
                  <p class="name">Michael Shan</p>
                  <span class="position">Web Developer</span>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="testimony-wrap p-4 pb-5">
                <div class="user-img mb-5" style="background-image: url(home/images/person_1.jpg)">
                  <span class="quote d-flex align-items-center justify-content-center">
                    <i class="icon-quote-left"></i>
                  </span>
                </div>
                <div class="text">
                  <p class="mb-5">Saya merasa sangat terpuaskan, segala sesuatu yang menyangkut liburan keluarga saya telah diatur semua oleh Gouhuy Jatim Park 3. Mantap!</p>
                  <p class="name">Michael Shan</p>
                  <span class="position">Web Developer</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
@endsection
