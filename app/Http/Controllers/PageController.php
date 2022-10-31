<?php

namespace App\Http\Controllers;

use App\Models\Bookings;
use App\Models\Hotels;
use App\Models\Users;
use App\Models\Vouchers;
use App\Rules\CaptchaRules;
use App\Rules\EmailRules;
use App\Rules\EmailSameRules;
use App\Rules\KodeSameRules;
use App\Rules\PhoneSameRules;
use App\Rules\PotonganRules;
use App\Rules\TopUpRules;
use App\Rules\UpperLowerRules;
use App\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PageController extends Controller
{

    public function addSession(Request $request)
    {
        $ada = false;
        $idhotel = $request->input('id');
        $arraytemp = $request->session()->get('idhotel');


        if($arraytemp != null){

            for ($i=0; $i < count($arraytemp); $i++) {
                if($arraytemp[$i] == $idhotel){
                    $ada = true;
                }

            }
            if(!$ada){
                echo "Masuk";
                $request->session()->push('idhotel',$idhotel);
            }
        }else{
            $request->session()->push('idhotel',$idhotel);
        }

        if($ada){
            $row2 = Hotels::where('id_hotel',$idhotel)->get();
                echo "<script>alert('Hotel ini telah di-Wishlist')</script>";
            return view('components.room',['tmps' => $row2]);
        }else{
            return redirect("/hotel");
        }
    }

    public function deleteSession(Request $request)
    {
        $arraytemp = Session::pull('idhotel');
        $delete = $request->input('idx');
        unset($arraytemp[$delete]);
        $toArray = array_values($arraytemp);
        $request->session()->put('idhotel',$toArray);

        return redirect('/profile');
    }

    public function viewHome()
    {
        $userlogin = Cookie::get('userlogin');
        if($userlogin == null){
            $userlogin = [];
        }else {
            $userlogin = json_decode($userlogin,true);
        }
        return view('components.home',['userlogin' => $userlogin]);
    }

    public function logout(Request $request)
    {
        $userlogin = Cookie::get('userlogin');
        $session = $request->session()->pull('idhotel');
        $session2 = $request->session()->pull('userlogin');
        if($userlogin == null){
            $userlogin = [];
        }else {
            $userlogin = json_decode($userlogin,true);
        }
        foreach ($userlogin as $user) {
            $nomor = $user['phone'];
            Users::where('nomor_hp',$nomor)->update(["status_user"=>1]);
        }

        unset($session);
        unset($session2);
        Cookie::queue(Cookie::forget('userlogin'));
        return redirect('/218116765');
    }

    public function viewHotel()
    {
        $userlogin = Cookie::get('userlogin');
        if($userlogin == null){
            $userlogin = [];
        }else {
            $userlogin = json_decode($userlogin,true);
        }
        $hotels = Hotels::where("status_hotel", 1)->get();
        return view('components.hotel',['hotels' => $hotels,'userlogin' => $userlogin]);
    }

    public function viewManagement()
    {
        $rowH = Hotels::all();
        $rowU = Users::all();
        return view('form.management',['hotels' => $rowH, 'users' => $rowU]);

    }

    public function banUser($id)
    {
        $user = Users::find($id);

        $user->update(["status_user" => 0]);

        return redirect("/management");
    }

    public function unbanUser($id)
    {
        $user = Users::find($id);

        $user->update(["status_user" => 1]);

        return redirect("/management");
    }

    public function nonaktifHotel($id)
    {
        $hotel = Hotels::find($id);

        $hotel->update(["status_hotel" => 0]);

        return redirect("/management");
    }

    public function aktifHotel($id)
    {
        $hotel = Hotels::find($id);

        $hotel->update(["status_hotel" => 1]);

        return redirect("/management");
    }

    public function viewRoom(Request $request)
    {
        $rooms = Cookie::get('rooms');
        if($rooms == null || $rooms != null){
            $rooms = [];
            $tmpid = $request->input('detail');
            $tmproom = [
                'id' => $tmpid
            ];
            array_push($rooms, $tmproom);
        }
        $row = Hotels::where('id_hotel',$tmpid)->get();
        foreach ($row as $item) {
            $voucher = Vouchers::where("id_voucher", $item->id_voucher)->get();

        }
        if(count($row) > 0 && count($voucher) == null){
            Cookie::queue('rooms', json_encode($rooms),60);
            return view('components.room',['tmps' => $row]);
        }else if (count($row) > 0 && count($voucher) > 0){
            Cookie::queue('rooms', json_encode($rooms),60);
            return view('components.room',['tmps' => $row, 'tmps2' => $voucher]);
        }
    }

    public function viewVoucher()
    {
        $rowH = Hotels::all();
        $rowV = Vouchers::all();
        return view('form.voucher',['hotels' => $rowH, 'vouchers' => $rowV]);

    }


    public function addVoucher(Request $request)
    {
        $rule = [
            'kode' => ['required', new KodeSameRules],
            'discount' => ['required', new PotonganRules],
            'hotel' => ['required']
        ];

        $messageError = [
            'required' => 'Kolom isian ini tolong diisi'
        ];

        $this->validate($request, $rule, $messageError);
        $kode = $request->input('kode');
        $chbox = $request->input('hotel');
        $dc = $request->input('discount');
        $id = [];
        $id = $chbox;

        $rowdata = Vouchers::withTrashed()->get();
        $count = count($rowdata) + 1;

        Vouchers::create([
            'id_voucher' => 'V'.$count,
            'kode_voucher' => $kode,
            'potongan' => $dc,
            'status_voucher' => 1
        ]);

        if(count($id) > 0){
            for ($i=0; $i < count($id); $i++) {
                $row = Hotels::find($id[$i]);
                $row->update(["id_voucher"=> 'V'.$count]);
            }
        }


        return redirect("/voucher");
    }

    public function deleteVoucher($id)
    {
        $voucher = Vouchers::find($id);
        $voucher->update(["status_voucher" => 0]);
        $voucher->delete();

        $del = Hotels::where("id_voucher",$id)->get();
        foreach ($del as $item) {
            $item->update(["id_voucher"=> 'kos']);
        }

        return redirect("/voucher");
    }

    public function bookingRoom(Request $request)
    {
        $rule = [
            'checkin' => ['required'],
            'checkout' => ['required']
        ];

        $messageError = [
            'required' => 'Kolom isian ini tolong diisi'
        ];

        $this->validate($request, $rule, $messageError);

        $userlogin = Cookie::get('userlogin');
        if($userlogin == null){
            $userlogin = [];
        }else {
            $userlogin = json_decode($userlogin,true);
        }
        foreach ($userlogin as $user) {
            $nomor = $user['phone'];
        }

        $rooms = Cookie::get('rooms');
        if($rooms == null){
            $rooms = [];
        }else {
            $rooms = json_decode($rooms,true);
            foreach ($rooms as $item) {
                $tmpid = $item['id'];
            }
        }

        $tmp = $request->input('id');
        $cin = $request->input('checkin');
        $cout = $request->input('checkout');
        $kode = $request->input('kodevoucher');

        $tanggal1 = new DateTime($cin);
        $tanggal2 = new DateTime($cout);


        $perbedaan = $tanggal2->diff($tanggal1)->format("%a");

        $rowuser = Users::where('nomor_hp',$nomor)->get();
        foreach ($rowuser as $item) {
            $saldo = $item->saldo_user;
        }
        $rowhotel = Hotels::where('id_hotel',$tmp)->get();
        foreach ($rowhotel as $item) {
            $harga = $item->harga_hotel;
        }

        if($kode != ""){
            $rowvoucher = Vouchers::where("kode_voucher", $kode)->get();
            foreach ($rowvoucher as $item) {
                $disc =  $harga * $item->potongan /100;
            }
            $harga = $harga - $disc;
        }
        $tmpharga = $harga * $perbedaan;
        if($saldo > $tmpharga){
            $saldo = $saldo - $tmpharga;
            Users::where('nomor_hp',$nomor)->update(["saldo_user"=>$saldo]);
            $row = Bookings::all();
            $count = count($row) + 1;

            Bookings::create([
                'id_booking' => 'B'.$count,
                'id_hotel' => $tmp,
                'nomor_hp' => $nomor,
                'check_in' => $cin,
                'check_out' => $cout,
                'bayar' => $tmpharga,
                'status_booking' => 1
            ]);

            Cookie::queue(Cookie::forget('rooms'));
            return redirect('/hotel');
        }else{
            $row2 = Hotels::where('id_hotel',$tmpid)->get();
            if(count($row2) > 0){
                echo "<script>alert('Saldo User tidak mencukupi untuk melakukan pembayaran')</script>";
                return view('components.room',['tmps' => $row2]);
            }
        }
    }

    public function viewProfile(Request $request)
    {
        $userlogin = Cookie::get('userlogin');
        if($userlogin == null){
            $userlogin = [];
        }else {
            $userlogin = json_decode($userlogin,true);
        }

        $arrBooking = [];
        foreach ($userlogin as $user) {
            $tmp = $user['phone'];
        }

        $rowbook = Bookings::where('nomor_hp',$tmp)->get();
        $row = Users::where('nomor_hp',$tmp)->get();
        if(count($row) > 0){
            if(count($rowbook) > 0){
                foreach ($rowbook as $item) {
                    $harga = $item->bayar;
                    $tanggal1 = new DateTime($item->check_in);
                    $tanggal2 = new DateTime($item->check_out);

                    $perbedaan = $tanggal2->diff($tanggal1)->format("%a");
                    $tmpidh = $item->id_hotel;

                    $tmprow = Hotels::where('id_hotel',$tmpidh)->get();
                    foreach ($tmprow as $item) {
                        $tmpbook = [
                            'idx' => $item->id_hotel,
                            'namah' => $item->nama_hotel,
                            'gambarh' => $item->gambar_hotel,
                            'hargah' => $harga,
                            'hari' => $perbedaan
                        ];
                        array_push($arrBooking, $tmpbook);
                    }
                }
                $arraytemp = Session::get('idhotel');
                if($arraytemp == null){
                    return view('components.profile',['row' => $row,'bookings' => $arrBooking]);
                }else{

                    $arr = [];
                    for ($i=0; $i < count($arraytemp); $i++) {
                        $row = Hotels::where('id_hotel', $arraytemp[$i])->get();
                        foreach ($row as $item) {
                            $tmp = [
                                'id' => $item->id_hotel,
                                'nama' => $item->nama_hotel,
                                'harga' => $item->harga_hotel,
                                'gambar' => $item->gambar_hotel
                            ];
                            array_push($arr, $tmp);
                        }
                    }
                    //dd($arr);

                    return view('components.profile',[
                        'row' => $row,
                        'bookings' => $arrBooking,
                        'sessions' => $arr
                    ]);
                }
            }
            return view('components.profile',['row' => $row]);
        }
    }

    public function topUp(Request $request)
    {
        $rule = [
            'topup' => ['required', new TopUpRules]
        ];

        $messageError = [
            'required' => 'Kolom isian ini tolong diisi'
        ];

        $this->validate($request,$rule,$messageError);

        $tmp = $request->input('tpupuser');
        $jml = $request->input('topup');
        $row = Users::where('nomor_hp',$tmp)->get();
        if(count($row) > 0){
            foreach ($row as $item) {
                $tmpsaldo = $item->saldo_user;
                $saldo = $tmpsaldo + $jml;
            }
            Users::where('nomor_hp',$tmp)->update(["saldo_user"=>$saldo]);
            $row = Users::where('nomor_hp',$tmp)->get();
            return redirect('/profile');
        }
    }


    public function tmbhHotel(Request $request){
        $rule = [
            'hotel_name' => ['required', 'alpha', 'max:20'],
            'hotel_addr' => ['required', 'max:50'],
            'hotel_img' => ['required'],
            'hotel_price' => ['required']
        ];

        $messageError = [
            'required' => 'Kolom isian ini tolong diisi',
            'alpha' => 'Karakter untuk isian di atas harus huruf',
            'max' => 'Panjang karakter untuk isian diatas maksimal :max karakter',
        ];

        $this->validate($request,$rule,$messageError);

        $row = Hotels::all();
        $count = count($row) + 1;
        Hotels::create([
            "id_hotel"=>'H'.$count,
            "nama_hotel"=>$request->hotel_name,
            "alamat_hotel"=>$request->hotel_addr,
            "gambar_hotel"=>$request->hotel_img,
            "harga_hotel"=>$request->hotel_price,
            "id_voucher"=>"kos",
            "status_hotel"=>1
        ]);
        echo "<script>alert('Berhasil Insert Data Hotel')</script>";
        return redirect('/admin');
    }

    public function cekLogin(Request $request)
    {
        $rules = [
            'phone' => ['required'],
            'password' => ['required'],
            'captcha' => ['required', new CaptchaRules]
        ];

        $messageError = [
            'required' => 'Kolom isian ini tolong diisi'
        ];

        $this->validate($request,$rules,$messageError);

        $adauser = false;
        $adahotel = false;
        $ada = false;

        $userlogin = Cookie::get('userlogin');
        if($userlogin == null || $userlogin != null){
            $userlogin = [];
        }

        $captcha = Cookie::get('captcha');
        if ($captcha == null) {
            $captcha = [];
        }
        else {
            $captcha = json_decode($captcha,true);
        }

        $list = ["LaRiCePaT", "mAiNbOlA", "BeRdiRi","mEnYaPu","mEnCuCi",
        "MeMbIlAs", "BeLaJaR", "JoNgKoK", "DuDuK", "BiCaRa",
        "mInUmAiR", "mAkAnRoTi", "mEmOtOnG", "mAsAkSaYuR", "mElIhAt",
        "BeRpIkIr", "MeNgEtIk", "MeNdEnGaR", "TidUrSiAnG", "BeRjAlAn"];

        $phone = $request->input('phone');
        $password = $request->input('password');

        $jmluser = Users::all();
        if(count($jmluser) > 0){
            $adauser = true;
        }

        $jmlhotel = Hotels::where("status_hotel", 1)->get();
        if(count($jmlhotel) > 0){
            $adahotel = true;
        }
        if($phone == "888" && $password == "888"){
            $tmpLogin = [
                'phone' => '888'
            ];
            array_push($userlogin,$tmpLogin);
            $request->session()->push('userlogin', $userlogin);
            return redirect('/admin');
        }else{
            if($adauser){
                if($adahotel){
                    $check = Users::where('nomor_hp',$phone)
                                    ->where('password', $password)
                                    ->get();
                        if(count($check) > 0){
                            foreach ($check as $item) {
                                $stat = $item->status_user;
                            }
                            if($stat == 0){
                                $tmppilih = rand(0,19);
                                $captcha = $list[$tmppilih];
                                Cookie::queue('captcha', json_encode($captcha),60);
                                echo "<script>alert('Tidak dapat login, akun ini telah di-ban');</script>";
                                return view('form.login', ['captcha' => $captcha]);
                            }else{
                                $ada = true;
                                $login = 2;
                                Users::where('nomor_hp',$phone)->update(["status_user"=>$login]);
                            }
                        }
                    if($ada){
                        foreach ($check as $item) {
                            $stat = $item->status_user;
                            $tmpLogin = [
                                'phone' => $item->nomor_hp
                            ];
                        }
                        if($stat == 1){
                            array_push($userlogin,$tmpLogin);
                            Cookie::queue('userlogin', json_encode($userlogin),60);
                            $request->session()->push('userlogin', $userlogin);
                            return view('components.hotel', ['hotels' => $jmlhotel, 'userlogin' => $userlogin]);
                        }else{
                            echo "<script>alert('Akun ini sudah melakukan login');</script>";
                            return view('components.home', ['userlogin' => $userlogin]);
                        }
                    }else{
                        $tmppilih = rand(0,19);
                        $captcha = $list[$tmppilih];
                        Cookie::queue('captcha', json_encode($captcha),60);
                        echo "<script>alert('User tidak terdaftar');</script>";
                        return view('form.login', ['captcha' => $captcha]);
                    }
                }else{
                    $tmppilih = rand(0,19);
                    $captcha = $list[$tmppilih];
                    Cookie::queue('captcha', json_encode($captcha),60);
                    echo "<script>alert('Tidak ada hotel yang ditambahkan');</script>";
                    return view('form.login', ['captcha' => $captcha]);
                }
            }else{
                $tmppilih = rand(0,19);
                $captcha = $list[$tmppilih];
                Cookie::queue('captcha', json_encode($captcha),60);
                echo "<script>alert('Tidak ada user yang terdaftar');</script>";
                return view('form.login', ['captcha' => $captcha]);
            }
        }
    }

    public function cekDataRegis(Request $request)
    {
        $rules = [
            'ncust' => ['required', 'max:24'],
            'ecust' => ['required', 'email', new EmailRules, new EmailSameRules],
            'phcust' => ['required', 'numeric', new PhoneSameRules],
            'pass' => ['required','confirmed','min:8','max:12', new UpperLowerRules],
            'pass_confirmation' => ['required'],
            'captcha' => ['required', new CaptchaRules]
        ];

        $messageError = [
            'required' => 'Kolom isian ini tolong diisi',
            'numeric' => 'Karakter untuk isian di atas harus angka',
            'email' => 'Karakter untuk isian di atas tidak mengandung @ dan .',
            'min' => 'Panjang karakter untuk isian di atas minimal :min karakter',
            'max' => 'Panjang karakter untuk isian di atas maksimal :max karakter',
            'confirmed' => 'Password dan Konfirm Password harus sama'
        ];

        $this->validate($request,$rules,$messageError);

        $captcha = Cookie::get('captcha');
        if ($captcha == null || $captcha != null) {
            $captcha = [];
        }

        $list = ["LaRiCePaT", "mAiNbOlA", "BeRdiRi","mEnYaPu","mEnCuCi",
        "MeMbIlAs", "BeLaJaR", "JoNgKoK", "DuDuK", "BiCaRa",
        "mInUmAiR", "mAkAnRoTi", "mEmOtOnG", "mAsAkSaYuR", "mElIhAt",
        "BeRpIkIr", "MeNgEtIk", "MeNdEnGaR", "TidUrSiAnG", "BeRjAlAn"];

        $tmppilih = rand(0,19);
        $captcha = $list[$tmppilih];
        Users::create([
            "nama_user"=>$request->ncust,
            "nomor_hp"=>$request->phcust,
            "saldo_user"=>0,
            "email"=>$request->ecust,
            "password"=>$request->pass,
            "status_user"=>1
        ]);
        echo "<script>alert('Berhasil Insert Data User')</script>";
        return redirect('/login');
    }


    public function loadCaptcha2()
    {
        $captcha = Cookie::get('captcha');
        if ($captcha == null || $captcha != null) {
            $captcha = [];
        }
        $list = ["LaRiCePaT", "mAiNbOlA", "BeRdiRi","mEnYaPu","mEnCuCi",
        "MeMbIlAs", "BeLaJaR", "JoNgKoK", "DuDuK", "BiCaRa",
        "mInUmAiR", "mAkAnRoTi", "mEmOtOnG", "mAsAkSaYuR", "mElIhAt",
        "BeRpIkIr", "MeNgEtIk", "MeNdEnGaR", "TidUrSiAnG", "BeRjAlAn"];

        $tmppilih = rand(0,19);
        $captcha = $list[$tmppilih];

        Cookie::queue('captcha', json_encode($captcha),60);
        return view('form.login', ['captcha' => $captcha]);
    }

    public function loadCaptcha()
    {
        $captcha = Cookie::get('captcha');
        if ($captcha == null || $captcha != null) {
            $captcha = [];
        }
        $list = ["LaRiCePaT", "mAiNbOlA", "BeRdiRi","mENyapu","mEnCuCi",
        "MeMbIlAs", "BeLaJaR", "JoNgKoK", "DuDuK", "BiCaRa",
        "mInUmAiR", "mAkAnRoTi", "mEmOtOnG", "mAsAkSaYuR", "mElIhAt",
        "BeRpIkIr", "MeNgEtIk", "MeNdEnGaR", "TidUrSiAnG", "BeRjAlAn"];

        $tmppilih = rand(0,19);
        $captcha = $list[$tmppilih];

        Cookie::queue('captcha', json_encode($captcha),60);
        return view('form.register', ['captcha' => $captcha]);
    }

}
