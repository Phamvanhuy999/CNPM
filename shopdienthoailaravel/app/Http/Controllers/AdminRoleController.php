<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use mysql_xdevapi\Exception;

class AdminRoleController extends Controller
{

    private $role;
    private $permission;

    /**
     * AdminRoleController constructor.
     * @param $role
     */
    public function __construct(Role $role,Permission $permission)
    {
        $this->role = $role;
        $this->permission = $permission;
    }

    public function trangchu(){
        $roles = $this->role->get();
        return view('admins.role.trangchu',compact('roles'));
    }
    public function themmoi(){
        $permissionsParent = $this->permission->where('parent_id',0)->get();
       /* dd($permissionsParent);*/
        return view('admins.role.themmoi',compact('permissionsParent'));
    }
    public function themmoi_gui(Request $request){
      $role= $this->role->create([
          'name'=>$request->name,
          'display_name'=>$request->display_name
       ]);
      $role->permissions()->attach($request->permission_id);
        session()->flash('success', 'Thêm mới thành công');
      return redirect()->route('roles.trangchu');

    }
    public function sua($id){
        $role=$this->role->find($id);
        $permissionsParent = $this->permission->where('parent_id',0)->get();
        $permissionsChecked =$role->permissions;
       /* dd($permissionsChecked);*/
        /* dd($permissionsParent);*/
        return view('admins.role.sua',compact('permissionsParent','role','permissionsChecked'));
    }
    public function sua_gui(Request $request,$id){
        $this->role->find($id)->update([
            'name'=>$request->name,
            'display_name'=>$request->display_name
        ]);
        $role=$this->role->find($id);
            $role->permissions()->sync($request->permission_id);
        session()->flash('success', 'Sửa thành công');
        return redirect()->route('roles.trangchu');
    }
    public function xoa($id){
        try {
            $this->role->find($id)->delete();
            return response()->json([
                'code'=>200,
                'message'=>'success'
            ],200);

        }catch(Exception $exception){
            Log::error('Messege : ' . $exception->getMessage() . 'line : ' . $exception->getLine());
            return response()->json([
                'code'=>500,
                'message'=>'fail'
            ],500);
        }
    }
}
