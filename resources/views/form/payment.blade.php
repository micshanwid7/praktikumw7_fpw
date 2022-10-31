@php
$page = "payment";
@endphp

@extends('formlayout')

@section('formcontent')
<section class="ftco-section bg-dark">
    <div class="col-lg-12">
        <div class="row justify-content-center">
            <div class="col-md-6 hotel-single ftco-animate mb-5 mt-4 ">
                <h1 class="mb-5" style="color: white; text-align: center;">Payment &amp; Booking</h4>
                <div class="fields">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="" style="color: white;">Full Name</div>
                                <input type="text" class="form-control" placeholder="Your Full Name" value="Michael Shan Widodo">
                            </div>
                            <div class="form-group">
                                <div class="" style="color: white;">Email</div>
                                <input type="text" class="form-control" placeholder="Email" value="msw123@gmail.com">
                            </div>
                            <div class="form-group">
                                <div class="" style="color: white;">Phone Number</div>
                                <input type="text" class="form-control" placeholder="Phone Number" value="081222334477">
                            </div>
                            <div class="form-group">
                                <div class="" style="color: white;">Check In</div>
                                <input type="text" class="form-control checkin_date" placeholder="Check In" value="09/24/2020">
                            </div>
                            <div class="form-group">
                                <div class="" style="color: white;">Check Out</div>
                                <input type="text" class="form-control checkout_date" placeholder="Check Out" value="09/28/2020">
                            </div>
                            <div class="form-group">
                                <div class="" style="color: white;">Total Guest</div>
                                <div class="select-wrap one-third">
                                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                    <select name="" id="" class="form-control" placeholder="Guest">
                                        <option value="0">1</option>
                                        <option value="1">2</option>
                                        <option value="2">3</option>
                                        <option value="3">4</option>
                                        <option value="4">5</option>
                                        <option value="5">> 5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="" style="color: white;">Rooms</div>
                                <input type="text" class="form-control" disabled value="Premiere">
                            </div>
                            <div class="form-group">
                                <div class="" style="color: white;">Total</div>
                                <input type="text" class="form-control" disabled value="2.500.000">
                            </div>
                            <div class="form-group">
                                <div class="" style="color: white;">Payment Method</div>
                                <div class="select-wrap one-third">
                                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                    <select name="" id="" class="form-control" placeholder="Guest">
                                        <option value="0">Gouhuy Wallet</option>
                                        <option value="1">BCA (Automatic)</option>
                                        <option value="2">BCA (Manual)</option>
                                        <option value="3">Ovo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Booking" class="btn btn-primary py-3">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</section>
@endsection
