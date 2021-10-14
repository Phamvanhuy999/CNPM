<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use App\HangSanXuat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HangSanXuatController extends Controller
{
    public function themmoi()
    {
        return view('admins.hangsanxuat.themmoi');
    }
    public function trangchu()
    {
        $hang_sxs = HangSanXuat::latest()->paginate(3);
        return view('admins.hangsanxuat.trangchu', compact('hang_sxs', $hang_sxs))->with('i', (request()->input('page', 1) - 1) * 3);
    }
    public function themmoi_gui(Request $request)
    {
        $hang_sx = new HangSanXuat();
        $hang_sx->ten_hangsx = $request->ten_hangsx;
        $hang_sx->thong_tin = $request->thong_tin;
        $hang_sx->save();
        session()->flash('success', 'Thêm mới thành công');
        return redirect()->route('hangsanxuats.trangchu');
    }

    public function sua($id)
    {
        $hang_sx = DB::table('hang_san_xuats')->find($id);
        return view('admins.hangsanxuat.sua', compact('hang_sx'));
    }
    public function sua_gui(Request $request, $id)
    {
        $hang_sx = HangSanXuat::findOrFail($id);
        $hang_sx->ten_hangsx = $request->ten_hangsx;
        $hang_sx->thong_tin = $request->thong_tin;
        $hang_sx->update();
        session()->flash('success', 'Sửa thành công');
        return redirect()->route('hangsanxuats.trangchu');
    }
    public function xoa($id)
    {
        $hang_sx = HangSanXuat::findOrFail($id);
        $hang_sx->delete();
        session()->flash('success', 'Xóa thành công');
        return redirect()->route('hangsanxuats.trangchu');
    }
}
