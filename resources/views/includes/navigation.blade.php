<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">

    <div class="container" style="margin-bottom: -25px; margin-top: -30px">
        <a class="navbar-brand" href="/218116765"><img src="home/images/MyLogo.jpg" alt="" style="width: 100px; height: 100px;"></a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">

            <li @php
                if($page == "home"){
                    echo('class="nav-item active"');
                }else{
                    echo('class="nav-item"');
                }
            @endphp ><a href="/218116765" class="nav-link">Home</a></li>
            <li @php
                if($page == "hotel"){
                    echo('class="nav-item active"');
                }else{
                    echo('class="nav-item"');
                }
            @endphp ><a href="/hotel" class="nav-link">Hotel</a></li>
            @php
                if($page == "login"){
                    echo('<li class="nav-item active"><a href="/login" class="nav-link">Login</a></li>');
                }else if($page == "hotel1" || $page == "home1" || $page == "admin" || $page == "room" || $page == "profile"){
                    echo('<li class="nav-item"><a href="/logout" class="nav-link">Logout</a></li>');
                }else{
                    echo('<li class="nav-item"><a href="/login" class="nav-link">Login</a></li>');
                }
            @endphp

            <li @php
                if($page == "payment"){
                    echo('class="nav-item active"');
                }else{
                    echo('class="nav-item"');
                }
            @endphp ><a href="/payment" class="nav-link">Payment</a></li>
        </ul>
      </div>
    </div>
</nav>

