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

