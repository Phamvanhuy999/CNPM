<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoaiSanPhamController extends Controller
{
   public function themmoi(){
      return view('admins.loaisanpham.themmoi');
   }
    public function trangchu(){
        return view('admins.loaisanpham.trangchu');
    }
}
