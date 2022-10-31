@php
    $page = "room";
@endphp

@extends('nonhomelayout')
@section('content')
<div class="hero-wrap js-fullheight" style="background-image: url('home/images/destination-4.jpg');">
    <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
                <div class="col-md-9 text-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
                        <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="index.html">Home</a></span> <span>Room</span></p>
                        <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Room</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="ftco-section ftco-degree-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 sidebar">
                <div class="sidebar-wrap ftco-animate">
                    <h3 class="heading mb-4">Find Room</h3>
                    <form action="/room">
                        <div class="fields">
                        <div class="form-group">
                        <input type="text" class="form-control" placeholder="Room Name">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control checkin_date" placeholder="Date from">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control checkout_date" placeholder="Date to">
                        </div>
                        <div class="form-group">
                            <h3 class="heading mb-4">Bed Type</h3>
                            <div class="select-wrap one-third">
                                <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                <select name="" id="" class="form-control" placeholder="Guest">
                                    <option value="0">Single-bed</option>
                                    <option value="1">Dual-bed</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="range-slider">
                            <h3 class="heading mb-4">Cost</h3>
                            <span>
                                <input type="number" value="500000" min="500000" max="2500000"/>
                                <input type="number" value="2500000" min="500000" max="2500000" style="float:right;"/>
                            </span>
                                        <input value="500000" min="500000" max="2500000" step="500000" type="range"/>
                                        <input value="2500000" min="500000" max="2500000" step="500000" type="range"/>
                            </div>
                        </div><br>
                        <div class="sidebar-wrap ftco-animate">
                            <h3 class="heading mb-4">Star Rating</h3>
                            <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">
                                        <p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i></span></p>
                                    </label>
                            </div>
                            <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1" checked>
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
            @isset($tmps)
                @foreach ($tmps as $tmp)
                    <div class="col-lg-9">
                        <div class="col-md-12 ftco-animate">
                            <div class="single-slider owl-carousel">
                                <div class="item">
                                    <div class="hotel-img" style="background-image: url({{ $tmp->gambar_hotel }});"></div>
                                </div>
                                <div class="item">
                                    <div class="hotel-img" style="background-image: url({{ $tmp->gambar_hotel }});"></div>
                                </div>
                                <div class="item">
                                    <div class="hotel-img" style="background-image: url({{ $tmp->gambar_hotel }});"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 hotel-single mt-4 mb-5 ftco-animate">
                            <h2>{{ $tmp->nama_hotel }}</h2>
                            <p class="rate mb-5">
                                <span class="loc"><a href="#"><i class="icon-map"></i>{{ $tmp->alamat_hotel }}</a></span>
                                <br>
                                <span class="star">
                                <i class="icon-star"></i>
                                <i class="icon-star"></i>
                                <i class="icon-star"></i>
                                <i class="icon-star"></i>
                                <i class="icon-star"></i>
                                5 Rating</span>
                            </p>
                            <p>Harga mulai Rp {{ $tmp->harga_hotel }}/malam. Letak strategis. Tersedia beragam fasilitas.</p>
                            <div class="d-md-flex mt-5 mb-5">
                                <ul>
                                    <li>Parkir</li>
                                    <li>Wifi</li>
                                    <li>Kolam Renang</li>
                                    <li>Playground</li>
                                </ul>
                                <ul class="ml-md-5">
                                    <li>Bar</li>
                                    <li>Billiard Pool</li>
                                    <li>Restaurant</li>
                                    <li>Rooftop</li>
                                </ul>
                            </div>
                            <p>Dapatkan harga menarik.</p>
                            <hr>
                            @isset($tmps2)
                                @foreach ($tmps2 as $tmp2)
                                    <p>Tersedia kode voucher : <span style="background-color: yellow"> {{ $tmp2->kode_voucher }}</span></p>
                                    <p>Diskon sebesar {{ $tmp2->potongan }} %</p>
                                    <p>Potongan harga sebesar Rp {{ ($tmp->harga_hotel * $tmp2->potongan) /100}}</p>
                                @endforeach
                            @endisset
                        </div>
                @endforeach
            @endisset
                <div class="col-md-12 hotel-single ftco-animate mb-5 mt-4">
                    <h4 class="mb-4">Our Rooms</h4>
                    <div class="row">
                        <div class="col-md-4">
                                <div class="destination">
                                    <a href="hotel-single.html" class="img img-2" style="background-image: url(home/images/room-3.jpg);"></a>
                                    <div class="text p-3">
                                        <div class="d-flex">
                                            <div class="one">
                                                <h3><a href="hotel-single.html">Classic</a></h3>
                                                <p class="rate">
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star-o"></i>
                                                    <span>4 Rating</span>
                                                </p>
                                            </div>
                                            <div class="two">
                                                <span class="price per-price">Rp 900.000<br><small>/malam</small></span>
                                            </div>
                                        </div>
                                        <p>2 tempat tidur single-bed</p>
                                        <hr>
                                        <p class="bottom-area d-flex">
                                            <span class="ml-auto"><a href="/payment">Booking Sekarang</a></span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="destination">
                                    <a href="hotel-single.html" class="img img-2" style="background-image: url(home/images/room-1.jpg);"></a>
                                    <div class="text p-3">
                                        <div class="d-flex">
                                            <div class="one">
                                                <h3><a href="hotel-single.html">Deluxe</a></h3>
                                                <p class="rate">
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star-o"></i>
                                                    <span>4 Rating</span>
                                                </p>
                                            </div>
                                            <div class="two">
                                                <span class="price per-price">Rp 1.500.000<br><small>/malam</small></span>
                                            </div>
                                        </div>
                                        <p>2 tempat tidur dual-bed</p>
                                        <hr>
                                        <p class="bottom-area d-flex">
                                            <span class="ml-auto"><a href="/payment">Booking Sekarang</a></span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="destination">
                                    <a href="hotel-single.html" class="img img-2" style="background-image: url(home/images/room-2.jpg);"></a>
                                    <div class="text p-3">
                                        <div class="d-flex">
                                            <div class="one">
                                                <h3><a href="hotel-single.html">Premiere</a></h3>
                                                <p class="rate">
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star-o"></i>
                                                    <span>4 Rating</span>
                                                </p>
                                            </div>
                                            <div class="two">
                                                <span class="price per-price">Rp 2.500.000<br><small>/malam</small></span>
                                            </div>
                                        </div>
                                        <p>2 tempat tidur single-bed dan 1 tempat tidur dual-bed</p>
                                        <hr>
                                        <p class="bottom-area d-flex">
                                            <span class="ml-auto"><a href="/payment">Booking Sekarang</a></span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <form action="/addWishlist" method="post">
                            @csrf
                            @foreach ($tmps as $tmp)
                                <input type="hidden" name="id" value="{{ $tmp->id_hotel }}">
                            @endforeach
                            <div class="form-group">
                                <input type="submit" value="Add to Wishlist" class="btn btn-primary py-3">
                            </div>
                        </form>


                        <h1>Booking Sekarang</h1>
                        <form action="/booking" method="post">
                            @csrf
                            @isset($tmps)
                                @foreach ($tmps as $tmp)
                                    <input type="hidden" name="id" value="{{ $tmp->id_hotel }}">
                                @endforeach
                            @endisset
                            <div class="form-group">
                                <div class="">Check In</div>
                                <input type="date" class="form-control" name="checkin">
                                @error('checkin')
                                    <div style="color:red; font-weight:bold"> {{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="">Check Out</div>
                                <input type="date" class="form-control" name="checkout">
                                @error('checkout')
                                    <div style="color:red; font-weight:bold"> {{$message}}</div>
                                @enderror
                            </div>
                            @isset($tmps2)
                            <div class="form-group">
                                <input type="text" class="form-control" name="kodevoucher" placeholder="Kode Voucher">
                            </div>
                            @endisset
                            <div class="form-group">
                                <input type="submit" value="Bayar" class="btn btn-primary py-3">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
