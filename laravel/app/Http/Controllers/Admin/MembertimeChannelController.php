<?php

namespace App\Http\Controllers\Admin;

use App\Models\MembertimeChannel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MembertimeChannelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {

           $this->middleware('permission:member-list', ['only' => ['index']]);
           $this->middleware('permission:member-add', ['only' => ['create','store']]);
           $this->middleware('permission:member-edit', ['only' => ['edit','update']]);
           $this->middleware('permission:member-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $membertimechannel = membertimechannel::query();
        $membertimechannel = $membertimechannel->latest()->paginate(25);

        return view('Admin.channel.membertime.index',compact('membertimechannel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.channel.membertime.create');
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
        $channels=MembertimeChannel::create($request->all());
        alert()->success('اطلاعات با موفقیت ثبت شد','پیغام سیستم')->persistent("تایید");
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MembertimeChannel  $membertimeChannel
     * @return \Illuminate\Http\Response
     */
    public function show(MembertimeChannel $membertimeChannel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MembertimeChannel  $membertimeChannel
     * @return \Illuminate\Http\Response
     */
    public function edit(MembertimeChannel $membertimechannel)
    {
        return view('Admin.channel.membertime.edit', compact(['membertimechannel']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MembertimeChannel  $membertimeChannel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MembertimeChannel $membertimechannel)
    {
        $request->merge(['active' => $request->has('active')]);
        $membertimechannel->update($request->all());
        alert()->success('ویرایش  با موفقیت انجام شد', 'پیغام سیستم')->persistent('تایید');
        return redirect(route('admin.membertimechannel.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MembertimeChannel  $membertimeChannel
     * @return \Illuminate\Http\Response
     */
    public function destroy(MembertimeChannel $membertimechannel)
    {
        $membertimechannel->delete();
     alert()->success('حذف با موفقیت انجام شد','پیغام سیستم')->persistent('تایید');
     return back();
    }
}
