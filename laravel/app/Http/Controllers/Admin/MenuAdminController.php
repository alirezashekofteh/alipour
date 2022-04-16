<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MenuAdmin;
use Illuminate\Http\Request;

class MenuAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menuadmin = MenuAdmin::query();

        if($keyword = request('parent')) {
            $menuadmin->where('parent' , $keyword);
        }
        else
        {
            $menuadmin->where('parent' , 0);
        }

        $menuadmin = $menuadmin->latest()->paginate(25);

       return view('Admin.MenuAdmin.index',compact('menuadmin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.MenuAdmin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

     $menuadmin=MenuAdmin::create($request->all());
     alert()->success('اطلاعات با موفقیت ثبت شد','پیغام سیستم')->persistent("تایید");
     return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MenuAdmin  $menuAdmin
     * @return \Illuminate\Http\Response
     */
    public function show(MenuAdmin $menuAdmin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MenuAdmin  $menuAdmin
     * @return \Illuminate\Http\Response
     */
    public function edit(MenuAdmin $menuadmin)
    {
       return view('Admin.MenuAdmin.update',compact('menuadmin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MenuAdmin  $menuAdmin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MenuAdmin $menuadmin)
    {
        $menuadmin->update($request->all());
        alert()->success('ویرایش  با موفقیت انجام شد','پیغام سیستم')->persistent('تایید');
        return redirect(route('admin.menuadmin.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MenuAdmin  $menuAdmin
     * @return \Illuminate\Http\Response
     */
    public function destroy(MenuAdmin $menuadmin)
    {
        $menuadmin->delete();
        alert()->success('حذف با موفقیت انجام شد','پیغام سیستم')->persistent('تایید');
        return back();
    }
}
