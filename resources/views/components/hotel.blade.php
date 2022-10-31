@php
    $page = "hotel";
@endphp

@extends('nonhomelayout')

@section('content')
@if ($userlogin != null)
    @php
        $page = "hotel1";
    @endphp

@endif
<div class="hero-wrap js-fullheight" style="background-image: url('home/images/destination-4.jpg');">
    <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
                <div class="col-md-9 text-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
                        <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="index.html">Home</a></span> <span>Hotel</span></p>
                        <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Hotel</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="ftco-section">
    <div class="container">
      <div class="row">
          <div class="col-lg-3 sidebar order-md-last ftco-animate">
              <div class="sidebar-wrap ftco-animate">
                @isset($userlogin)
                    @foreach ($userlogin as $user)
                        <span class="ml-auto">
                            <form action="/profile" method="get">
                                @csrf
                                <input type="hidden" name="detail" value="{{ $user['phone'] }}">
                                <input type="submit" value="Profile" class="btn btn-primary py-3 px-5">
                        </form></span>
                    @endforeach
                @endisset
                <br>
                  <h3 class="heading mb-4">Find Hotel</h3>
                  <form action="/hotel">
                      <div class="fields">
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Hotel Name">
                    </div>
                    <div class="form-group">
                        <div class="range-slider">
                            <h3 class="heading mb-4">Far From Jatim Park 3</h3>
                            <span>
                                <input type="number" value="500" min="500" max="5000"/>
                                <input type="number" value="5000" min="500" max="5000" style="float: right;"/>
                            </span>
                                        <input value="500" min="500" max="5000" step="500" type="range"/>
                                        <input value="5000" min="500" max="5000" step="500" type="range"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="range-slider">
                            <h3 class="heading mb-4">Cost</h3>
                            <span>
                                <input type="number" value="500000" min="500000" max="6500000"/>
                                <input type="number" value="5000000" min="500000" max="6500000" style="float:right;"/>
                            </span>
                                        <input value="500000" min="500000" max="6500000" step="500000" type="range"/>
                                        <input value="5000000" min="500000" max="5000000" step="500000" type="range"/>
                        </div>
                    </div><br>
                    <div class="sidebar-wrap ftco-animate">
                        <h3 class="heading mb-4">Star Rating</h3>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1" checked>
                                <label class="form-check-label" for="exampleCheck1">
                                    <p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i></span></p>
                                </label>
                            </div>
                            <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">
                                <p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star-o"></i></span></p>
                            </label>
                            </div>
                            <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">
                                <p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star-o"></i><i class="icon-star-o"></i></span></p>
                            </label>
                            </div>
                            <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">
                                <p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star-o"></i><i class="icon-star-o"></i><i class="icon-star-o"></i></span></p>
                            </label>
                            </div>
                            <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">
                                <p class="rate"><span><i class="icon-star"></i><i class="icon-star-o"></i><i class="icon-star-o"></i><i class="icon-star-o"></i><i class="icon-star-o"></i></span></p>
                            </label>
                            </div>
                    </div>
                    <div class="form-group">
                      <input type="submit" value="Search" class="btn btn-primary py-3 px-5">
                    </div>
                  </div>
                </form>
              </div>

        </div>
        <div class="col-lg-9">
            <div class="row">
                @isset($hotels)
                    @foreach ($hotels as $hotel)
                        <div class="col-sm col-md-6 col-lg-4 ftco-animate">
                            <div class="destination">
                                <a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url({{ $hotel->gambar_hotel }});">
                                    <div class="icon d-flex justify-content-center align-items-center">
                                        <span class="icon-link"></span>
                                    </div>
                                </a>
                                <div class="text p-3">
                                    <div class="d-flex">
                                        <div class="one">
                                            <h3><a href="#">{{ $hotel->nama_hotel }}</a></h3>
                                            <p class="rate">
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <span>5 Rating</span>
                                            </p>
                                        </div>
                                        <div class="two">
                                            <span class="price per-price">{{ $hotel->harga_hotel }}<br><small>/malam</small></span>
                                        </div>
                                    </div>
                                    <p>Harga mulai {{ $hotel->harga_hotel }}/malam. Letak strategis. Tersedia beragam fasilitas.</p>
                                    <hr>
                                    <p class="bottom-area d-flex">
                                        <span><i class="icon-map-o"></i>{{ $hotel->alamat_hotel }}</span>
                                        <span class="ml-auto">
                                            <form action="/room" method="get">
                                                @csrf
                                                <input type="hidden" name="detail" value="{{ $hotel->id_hotel }}">
                                                <input type="submit" value="Detail Hotel" class="btn btn-primary py-3 px-5">
                                        </form></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endisset
            </div>
            <div class="row mt-5">
                <div class="col text-center">
                  <div class="block-27">
                    <ul>
                      <li><a href="#">&lt;</a></li>
                      <li class="active"><span>1</span></li>
                      <li><a href="#">2</a></li>
                      <li><a href="#">3</a></li>
                      <li><a href="#">&gt;</a></li>
                    </ul>
                  </div>
                </div>
              </div>
        </div>
      </div>
    </div>
</section>
@endsection

