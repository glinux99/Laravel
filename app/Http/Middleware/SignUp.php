<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SignUp
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if((session('data'))){
            $data= session('data');
            $data = json_decode(json_encode($data), true);
            if(session('account')=='Client'){
                return response()->view('client.client', compact('data'));
            }
            if(session('account')=='Admins'){
                return response()->view('admin.admin', compact('data'));
            }
            if(session('account')=='Caissier'){
                return response()->view('caissier.caissier',compact('data'));
            }
        }
        else
        {
            session()->flash('error','no_autorization');
            return response()->view('/acceuil');
        }
    }
}


