<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Gouhuy Javanese Park</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="MyIcon.jpg" rel="icon">
    <link href="MyIcon.jpg" rel="apple-touch-icon">

    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Abril+Fatface" rel="stylesheet">

    <link rel="stylesheet" href="home/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="home/css/animate.css">

    <link rel="stylesheet" href="home/css/owl.carousel.min.css">
    <link rel="stylesheet" href="home/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="home/css/magnific-popup.css">

    <link rel="stylesheet" href="home/css/aos.css">

    <link rel="stylesheet" href="home/css/ionicons.min.css">

    <link rel="stylesheet" href="home/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="home/css/jquery.timepicker.css">


    <link rel="stylesheet" href="home/css/flaticon.css">
    <link rel="stylesheet" href="home/css/icomoon.css">
    <link rel="stylesheet" href="home/css/style.css">
  </head>
  <body>
    @if (\Session::has("pesan"))
        <script>alert('Not Authorized!');</script>
    @endif
    @include('includes.navigation')

    @include('includes.header');

    <section class="ftco-section justify-content-end ftco-search">
        <div class="container-wrap ml-auto">
            <div class="row no-gutters">
                <div class="col-md-12 nav-link-wrap">
                    <div class="nav nav-pills justify-content-center text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">Gouhuy</a>

                        <a class="nav-link" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" role="tab" aria-controls="v-pills-2" aria-selected="false">Javanese</a>

                        <a class="nav-link" id="v-pills-3-tab" data-toggle="pill" href="#v-pills-3" role="tab" aria-controls="v-pills-3" aria-selected="false">Park</a>

                        <a class="nav-link" id="v-pills-4-tab" data-toggle="pill" href="#v-pills-4" role="tab" aria-controls="v-pills-4" aria-selected="false">Javanese Park</a>

                    </div>
                </div>
                <div class="col-md-12 tab-wrap">
                    <div class="tab-content p-4 px-5" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-nextgen-tab">
                            <div class="intro ftco-animate">
                                <h3>Go Uhuy</h3>
                                <p>Diambil dari bahasa inggris dan gaul yang beredar di masyarakat. Go yang artinya ayo, sedangkan uhuy mengekspresikan rasa kagum dan memuji.</p>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-performance-tab">
                            <div class="intro ftco-animate">
                                <h3>Javanese</h3>
                                <p>Javanese yang berarti Jawa.</p>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="v-pills-3" role="tabpanel" aria-labelledby="v-pills-effect-tab">
                            <div class="intro ftco-animate">
                                <h3>Park</h3>
                                <p>Park dalam bahasa inggris yang artinya taman.</p>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="v-pills-4" role="tabpanel" aria-labelledby="v-pills-effect-tab">
                            <div class="intro ftco-animate">
                                <h3>Javanese Park </h3>
                                <p>Sebuah objek wisata yang sangat cocok untuk dikunjungi saat liburan bersama teman, saudara, ataupun keluarga.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</section>

        @yield('content')

@include('includes.footer')

<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

<script src="home/js/jquery.min.js"></script>
<script src="home/js/jquery-migrate-3.0.1.min.js"></script>
<script src="home/js/popper.min.js"></script>
<script src="home/js/bootstrap.min.js"></script>
<script src="home/js/jquery.easing.1.3.js"></script>
<script src="home/js/jquery.waypoints.min.js"></script>
<script src="home/js/jquery.stellar.min.js"></script>
<script src="home/js/owl.carousel.min.js"></script>
<script src="home/js/jquery.magnific-popup.min.js"></script>
<script src="home/js/aos.js"></script>
<script src="home/js/jquery.animateNumber.min.js"></script>
<script src="home/js/bootstrap-datepicker.js"></script>
<script src="home/js/jquery.timepicker.min.js"></script>
<script src="home/js/scrollax.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="home/js/google-map.js"></script>
<script src="home/js/main.js"></script>

</body>
</html>

