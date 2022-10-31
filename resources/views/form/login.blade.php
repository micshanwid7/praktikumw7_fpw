@php
    $page = "login";
@endphp

@extends('formlayout')
@section('formcontent')
<section class="ftco-section bg-dark">
<div class="col-lg-12">
    <div class="row justify-content-center">
        <div class="col-md-6 hotel-single ftco-animate mb-5 mt-4 ">
            <h1 class="mb-5" style="color: white; text-align: center;">Login</h4>
            <div class="fields">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ url('/inLogin') }}" method="post">
                            <div class="form-group">
                                @csrf
                                <input type="text" class="form-control" name="phone" placeholder="Phone Number">
                                @error('phone')
                                    <div style="color:red; font-weight:bold"> {{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" placeholder="Password">
                                @error('password')
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
                            <div class="send">
                                <div class="form-group">
                                    <input type="submit" value="Login" class="btn btn-primary py-3">
                                </div>
                            </div>
                        </form>
                            <div class="form-group">
                                <a href="/register">Don't have an account, create an account?</a>
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
