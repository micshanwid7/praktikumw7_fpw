@php
    $page = "register";
@endphp


@extends('formlayout')

@section('formcontent')
<section class="ftco-section bg-dark">
<div class="col-lg-12">
    <div class="row justify-content-center">
        <div class="col-md-6 hotel-single ftco-animate mb-5 mt-4 ">
            <h1 class="mb-5" style="color: white; text-align: center;">Register</h4>
            <div class="fields">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ url('/insertData') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control" name="ncust" placeholder="Full Name" value="">
                                @error('ncust')
                                    <div style="color:red; font-weight:bold"> {{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="ecust" placeholder="Email" value="">
                                @error('ecust')
                                    <div style="color:red; font-weight:bold"> {{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control" name="phcust" placeholder="Phone Number" value="">
                                @error('phcust')
                                    <div style="color:red; font-weight:bold"> {{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="pass" placeholder="Password" value="">
                                @error('pass')
                                    <div style="color:red; font-weight:bold"> {{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="pass_confirmation" placeholder="Repeat your password" value="">
                                @error('pass_confirmation')
                                    <div style="color:red; font-weight:bold"> {{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                @isset($captcha)
                                    <div id="captcha_text" style="font-weight: bold; color: white;">{{ $captcha }}</div>
                                @endisset
                                <br>
                                <input type="text" class="form-control" name="captcha" placeholder="Input Captcha (Palindrom - Case Sensitive)" value="">
                                @error('captcha')
                                    <div style="color:red; font-weight:bold"> {{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group submit">
                                <input type="submit" value="Register" class="btn btn-primary py-3">
                            </div>
                        </form>
                            <div class="form-group">
                                <a href="/login">I already a member</a>
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
