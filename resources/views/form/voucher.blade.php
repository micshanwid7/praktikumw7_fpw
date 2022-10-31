@php
    $page = "admin";
@endphp

@extends('formlayout')


@section('formcontent')
<section class="ftco-section bg-dark">
    <div class="col-lg-12">
        <div class="row justify-content-center">
            <div class="col-md-6 hotel-single ftco-animate mb-5 mt-4 ">
                <h1 class="mb-5" style="color: white; text-align: center;">Hello, Admin</h1>
                    <h4 class="mb-5" style="color: white;">Tambah Voucher</h4>
                <div class="fields">
                    <div class="row">
                        <div class="col-md-12">
                            <button class="btn bg-dark"><a href="/admin">Kembali ke Input Penginapan</a></button>
                            <br><br>
                            <form action="{{ url('/insertDataV') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control" name="kode" id="" placeholder="Kode Voucher">
                                    @error('kode')
                                        <div style="color:red; font-weight:bold"> {{$message}}</div>
                                    @enderror
                                </div>
                                <span style="color: white"> Penginapan : </span><br>
                                <hr>
                                @isset($hotels)
                                    @foreach ($hotels as $hotel)
                                    <div class="form-group">
                                        <input type="checkbox" name="hotel[]" value="{{ $hotel->id_hotel }}">
                                        <label for="hotel" style="color: white">{{ $hotel->nama_hotel }}</label>
                                    </div>
                                    @endforeach
                                    @error('hotel')
                                        <div style="color:red; font-weight:bold"> {{$message}}</div>
                                    @enderror
                                @endisset
                                <br>
                                <div class="form-group">
                                    <input type="number" class="form-control" name="discount" id="" placeholder="Potongan(%)">
                                    @error('discount')
                                        <div style="color:red; font-weight:bold"> {{$message}}</div>
                                    @enderror
                                </div>
                                <br>
                                <div class="send">
                                    <div class="form-group">
                                        <input type="submit" value="Add Voucher" class="btn btn-primary py-3">
                                    </div>
                                </div>
                            </form>

                            <span style="color: white">List Voucher</span><br>

                            <table border="1px solid black" style="color: white">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Voucher</th>
                                        <th>Potongan (%)</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @isset($vouchers)
                                    @php
                                        $ctr = 1;
                                    @endphp
                                    @foreach ($vouchers as $voucher)
                                        <tr>
                                            <td>{{ $ctr }}</td>
                                            <td>{{ $voucher->kode_voucher }}</td>
                                            <td>{{ $voucher->potongan }}</td>
                                            <td>
                                                <a href="{{ url('/voucher/hapus/'.$voucher->id_voucher) }}">
                                                    <button onclick="return confirm('Anda yakin ingin menghapus voucher ini?');">HAPUS VOUCHER</button>
                                                </a>
                                            </td>
                                        </tr>
                                        @php
                                            $ctr++
                                        @endphp
                                    @endforeach
                                @endisset
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    </section>
@endsection
