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
                <span style="color: white">List User</span><br>
                <table border="1px solid black" style="color: white">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama User</th>
                            <th>Nomor Hp</th>
                            <th>Saldo (Rp)</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @isset($users)
                        @php
                            $ctr = 1;
                        @endphp
                        @foreach ($users as $item)
                            <tr>
                                <td>{{ $ctr }}</td>
                                <td>{{ $item->nama_user }}</td>
                                <td>{{ $item->nomor_hp }}</td>
                                <td>{{ $item->saldo_user }}</td>
                                <td>{{ $item->email }}</td>
                                <td>
                                    @if ($item->status_user == 1 || $item->status_user == 2)
                                        <a href="{{ url('/management/ban/'.$item->id_user) }}">
                                            <button>BAN USER</button>
                                        </a>
                                    @else
                                        <a href="{{ url('/management/unban/'.$item->id_user) }}">
                                            <button>UNBAN USER</button>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                            @php
                                $ctr++
                            @endphp
                        @endforeach
                    @endisset
                    </tbody>
                </table>

                <br><br>
                <span style="color: white">List Hotel</span><br>
                <table border="1px solid black" style="color: white;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Hotel</th>
                            <th>Alamat Hotel</th>
                            <th>Harga Hotel (Rp)</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @isset($hotels)
                        @php
                            $ctr = 1;
                        @endphp
                        @foreach ($hotels as $item)
                            <tr>
                                <td>{{ $ctr }}</td>
                                <td>{{ $item->nama_hotel }}</td>
                                <td>{{ $item->alamat_hotel }}</td>
                                <td>{{ $item->harga_hotel }}</td>
                                <td>
                                    @if ($item->status_hotel == 1)
                                        <a href="{{ url('/management/nonaktif/'.$item->id_hotel) }}">
                                            <button>NONAKTIFKAN PENGINAPAN</button>
                                        </a>
                                    @else
                                        <a href="{{ url('/management/aktif/'.$item->id_hotel) }}">
                                            <button>AKTIFKAN PENGINAPAN</button>
                                        </a>
                                    @endif
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
    </section>
@endsection
