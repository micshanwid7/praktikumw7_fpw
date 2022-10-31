<?php

namespace App\Http\Middleware;

use App\Models\Users;
use Closure;
use Illuminate\Support\Facades\Session;

class Authentication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if($request->session()->has('userlogin')){
            $tmp = $request->session()->get('userlogin', 'Tidak ada user login');
            if($tmp[0][0]['phone'] != "888"){

                $url = url()->previous();
                if($url == "http://localhost:8000/login"){
                    return redirect('/hotel')->with('pesan','Not Authorized!');
                }else{
                    return back()->with('pesan','Not Authorized!');
                }

            }else{
                return $next($request);
            }

        }else{
            return redirect("/login");

        }
        return $next($request);
    }
}
