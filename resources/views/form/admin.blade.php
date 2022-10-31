@php
    $page = "admin";
@endphp

@extends('formlayout')

@section('formcontent')
<section class="ftco-section bg-dark">
<div class="col-lg-12">
    <div class="row justify-content-center">
        <div class="col-md-6 hotel-single ftco-animate mb-5 mt-4 ">
            <h1 class="mb-5" style="color: white; text-align: center;">Hello, Admin</h4>
            <div class="fields">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ url('/insertDataH') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control" name="hotel_name" id="coba" placeholder="Hotel Name">
                                @error('hotel_name')
                                    <div style="color:red; font-weight:bold"> {{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="hotel_addr" placeholder="Hotel Address">
                                @error('hotel_addr')
                                    <div style="color:red; font-weight:bold"> {{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="hotel_img" id="imghotel" placeholder="Hotel Image">
                                @error('hotel_img')
                                    <div style="color:red; font-weight:bold"> {{$message}}</div>
                                @enderror
                                <button type="button" onclick="preview(); return false;">Preview Image</button>
                                <br>
                                <img id="primg" src="" alt="NONE.jpg" style="width: 100px; height: 100px">
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control" name="hotel_price" placeholder="Hotel Price">
                                @error('hotel_price')
                                    <div style="color:red; font-weight:bold"> {{$message}}</div>
                                @enderror
                            </div>
                            <div class="send">
                                <div class="form-group">
                                    <input type="submit" value="Add Hotel" class="btn btn-primary py-3">
                                </div>
                            </div>
                        </form>
                        <button class="btn bg-dark"><a href="/voucher">Tambah Voucher</a></button>
                        <button class="btn bg-dark"><a href="/management">Management User dan Hotel</a></button>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
</section>
@endsection
