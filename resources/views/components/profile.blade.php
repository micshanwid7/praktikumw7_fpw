@php
    $page = "profile";
@endphp

@extends('nonhomelayout')
@section('content')
<div class="hero-wrap js-fullheight" style="background-image: url('home/images/destination-4.jpg');">
    <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
                <div class="col-md-9 text-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
                        <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="index.html">Home</a></span> <span>Profile</span></p>
                        <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Profile</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section contact-section ftco-degree-bg">
    <div class="container">
      <div class="row d-flex mb-5 contact-info">
        <div class="col-md-12 mb-4">
          <h2 class="h4">Your Account Profile</h2>
        </div>
        <div class="w-100"></div>
        @isset($row)
            @foreach ($row as $item)
                <div class="col-md-12">
                    <p><span style="font-weight: bold">Nama:</span><br>{{ $item->nama_user}}</p>
                </div>
                <div class="col-md-12">
                    <p><span style="font-weight: bold">Nomor Hp:</span><br>{{ $item->nomor_hp }}</p>
                </div>
                <div class="col-md-12">
                    <p><span style="font-weight: bold">Email:</span><br>{{ $item->email }}</p>
                </div>
                <div class="col-md-12">
                    <p><span style="font-weight: bold">Saldo User: </span><br>Rp {{ $item->saldo_user }}</p>
                </div>
                <div class="col-md-63">
                    <form action="/topup" method="post">
                        @csrf
                        <input type="hidden" name="tpupuser" value="{{ $item->nomor_hp }}">
                        <input type="number" class="form-control" name="topup" placeholder="Top Up" value="">
                        @error('topup')
                            <div style="color:red; font-weight:bold"> {{$message}}</div>
                        @enderror
                        <br>
                        <input type="submit" value="Top Up" class="btn btn-primary py-3 px-5">
                    </form></span>
                </div>
            @endforeach
        @endisset
        <br><br><br><br>
        <h2 class="h4" style="margin-top: 200px">Your Booking History</h2>
        <div class="w-100"></div>
        <div class="col-lg-9">
            <div class="row">
                @isset($bookings)
                    @foreach ($bookings as $booking)
                        <div class="col-sm col-md-6 col-lg-4 ftco-animate">
                            <div class="destination">
                                <a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url({{ $booking['gambarh'] }});">
                                    <div class="icon d-flex justify-content-center align-items-center">
                                        <span class="icon-link"></span>
                                    </div>
                                </a>
                                <div class="text p-3">
                                    <div class="d-flex">
                                        <div class="one">
                                            <h3><a href="#">{{ $booking['namah'] }}</a></h3>
                                        </div>
                                    </div>
                                    <p>Pembayaran Rp {{ $booking['hargah'] }}<br>Jumlah hari : {{$booking['hari'] }} hari</p>
                                </div>
                                <hr>
                                <span class="ml-auto">
                                    <form action="/room" method="get">
                                        @csrf
                                        <input type="hidden" name="detail" value="{{ $booking['idx'] }}">
                                        <input type="submit" value="Pesan Hotel" class="btn btn-primary py-3 px-5">
                                </form></span>
                            </div>
                        </div>
                    @endforeach
                @endisset
            </div>
        </div>

        <br><br><br><br>
        <h2 class="h4" style="margin-top: 600px; margin-left: -600px">Your Wishlist</h2>
        <div class="w-100"></div>
        <div class="col-lg-9">
            <div class="row">
                @isset($sessions)
                    @php
                        $idx = 0;
                    @endphp
                        @foreach ($sessions as $session)
                            <div class="col-sm col-md-6 col-lg-4 ftco-animate">
                                <div class="destination">
                                    <a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url({{ $session['gambar'] }});">
                                        <div class="icon d-flex justify-content-center align-items-center">
                                            <span class="icon-link"></span>
                                        </div>
                                    </a>
                                    <div class="text p-3">
                                        <div class="d-flex">
                                            <div class="one">
                                                <h3><a href="#">{{ $session['nama'] }}</a></h3>
                                            </div>
                                        </div>
                                        <p>Rp {{ $session['harga'] }}/malam
                                    </div>
                                    <hr>
                                    <span class="ml-auto">
                                        <form action="/room" method="get">
                                            @csrf
                                            <input type="hidden" name="detail" value="{{ $session['id'] }}">
                                            <input type="submit" value="Lihat Hotel" class="btn btn-primary py-3 px-5">
                                    </form></span>
                                    <br>
                                    <span class="ml-auto">
                                        <form action="/delWishlist" method="post" onclick="return confirm('Anda yakin ingin menghapus hotel ini dari wishlist?');">
                                            @csrf
                                            <input type="hidden" name="idx" value="{{ $idx }}">
                                            <input type="submit" value="Hapus dari Wishlist" class="btn btn-primary py-3 px-5">
                                    </form></span>
                                </div>
                            </div>
                            @php
                                $idx = $idx + 1;
                            @endphp
                        @endforeach
                @endisset
            </div>
        </div>
      </div>
    </div>
  </section>
@endsection
