<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use App\LoaiSanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoaiSanPhamController extends Controller
{
   public function themmoi(){
      return view('admins.loaisanpham.themmoi');
   }
    public function trangchu(){
        $loai_sps = LoaiSanPham::latest()->paginate(3);
        return view('admins.loaisanpham.trangchu',compact('loai_sps',$loai_sps))->with('i', (request()->input('page', 1) - 1) * 3);
    }
    public function themmoi_gui(Request $request){
        $loaisp = new LoaiSanPham();
        $loaisp->ten_loaisp = $request->ten_loaisp;
        $loaisp->save();
        session()->flash('success', 'Thêm mới thành công')->time(3);
       return redirect()->route('loaisanphams.trangchu');
    }

    public function sua($id)
    {
        $loai_sp = DB::table('loai_san_phams')->find($id);
        return view('admins.loaisanpham.sua',compact('loai_sp'));
    }
    public function sua_gui(Request $request,$id){
       $loai_sp = LoaiSanPham::findOrFail($id);
       $loai_sp->ten_loaisp =$request->ten_loaisp;
       $loai_sp->update();
        session()->flash('success', 'Sửa thành công');
       return redirect()->route('loaisanphams.trangchu');
    }
    public function xoa($id){
        $loai_sp = LoaiSanPham::findOrFail($id);
        $loai_sp->delete();
        session()->flash('success', 'Xóa thành công');
        return redirect()->route('loaisanphams.trangchu');
    }

}
