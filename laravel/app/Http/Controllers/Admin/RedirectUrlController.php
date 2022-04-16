<?php

namespace App\Http\Controllers\Admin;

use App\Models\RedirectUrl;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RedirectUrlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {

           $this->middleware('permission:url-list', ['only' => ['index']]);
           $this->middleware('permission:url-add', ['only' => ['create','store']]);
           $this->middleware('permission:url-edit', ['only' => ['edit','update']]);
           $this->middleware('permission:url-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $redirect = RedirectUrl::query();

        if ($keyword = request('search')) {
            $redirect->where('oldurl', 'LIKE', "%{$keyword}%")->orWhere('newurl', 'LIKE', "%{$keyword}%");
        }
        $redirect = $redirect->latest()->paginate(25);

        return view('Admin.redirect.index',compact('redirect'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.redirect.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->merge(['active' => $request->has('active')]);
        $channels=RedirectUrl::create($request->all());
        alert()->success('اطلاعات با موفقیت ثبت شد','پیغام سیستم')->persistent("تایید");
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RedirectUrl  $redirectUrl
     * @return \Illuminate\Http\Response
     */
    public function show(RedirectUrl $redirecturl)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RedirectUrl  $redirectUrl
     * @return \Illuminate\Http\Response
     */
    public function edit(RedirectUrl $redirecturl)
    {
      
        return view('Admin.redirect.edit',compact(['redirecturl']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RedirectUrl  $redirectUrl
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RedirectUrl $redirecturl)
    {
        $request->merge(['active' => $request->has('active')]);
        $redirecturl->update($request->all());
        alert()->success('ویرایش  با موفقیت انجام شد', 'پیغام سیستم')->persistent('تایید');
        return redirect(route('admin.redirecturl.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RedirectUrl  $redirectUrl
     * @return \Illuminate\Http\Response
     */
    public function destroy(RedirectUrl $redirecturl)
    {
        $redirecturl->delete();
        alert()->success('حذف با موفقیت انجام شد','پیغام سیستم')->persistent('تایید');
        return back();
    }
}
