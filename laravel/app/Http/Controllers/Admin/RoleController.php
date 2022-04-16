<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use URL;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
          $this->middleware('permission:role-list', ['only' => ['index']]);
          $this->middleware('permission:role-create', ['only' => ['create','store']]);
          $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
          $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $roles = Role::orderBy('id', 'DESC')->paginate(5);
        return view('Admin.role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permission = Permission::where('parent',0)->get();
        $role = new Role;
        $action = URL::route('admin.role.store');
        $title = 'افزودن نقش کاربری جدید';
        $rolePermissions=array();
        return view('Admin.role.create', compact(['role', 'permission', 'title', 'action','rolePermissions']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'name_fa' => 'required',
            'permission' => 'required',
        ]);

        $role = Role::create([
            'name' => $request->input('name'),
            'name_fa' => $request->input('name_fa'),
        ]);
        $role->syncPermissions($request->input('permission'));

        alert()->success('اطلاعات با موفقیت ثبت شد', 'پیغام سیستم')->persistent("تایید");
        return back();
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions", "role_has_permissions.permission_id", "=", "permissions.id")
            ->where("role_has_permissions.role_id", $id)
            ->get();

        return view('roles.show', compact('role', 'rolePermissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::find($id);
   
        $permission = Permission::where('parent',0)->get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id", $id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();
        $action = URL::route('admin.role.update', $id);
        $title = 'افزودن نقش کاربری جدید';
        return view('Admin.role.create', compact(['role', 'permission', 'title', 'action', 'rolePermissions']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
        $this->validate($request, [
            'name' => 'required',
            'name_fa' => 'required',
            'permission' => 'required',

        ]);

        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->name_fa = $request->input('name_fa');
        $role->save();

        $role->syncPermissions($request->input('permission'));

        alert()->success('ویرایش  با موفقیت انجام شد', 'پیغام سیستم')->persistent('تایید');
        return redirect(route('admin.role.index'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("roles")->where('id', $id)->delete();
        return redirect()->route('roles.index')
            ->with('success', 'Role deleted successfully');
    }
}
