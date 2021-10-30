<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function loginAdmin(){
      /*  dd(bcrypt("admin123"));*/
     /*   if(auth()->check()){
            return  redirect()->to('home');
        }*/
        return view('admins.login');
    }

    public function postLoginAdmin(Request $request){
     /* dd($request->all());*/
        $remember =$request->has('remember_me')?true:false;
        if(auth()->attempt([
            'name'=>$request->name,
            'password'=>$request->password

        ],$remember)){
            return redirect()->to('home');
        }
    }
}
