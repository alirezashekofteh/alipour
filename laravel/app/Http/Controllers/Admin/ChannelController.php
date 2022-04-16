<?php

namespace App\Http\Controllers\Admin;
use App\Exports\ChannelExport;
use App\Models\Channel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ChannelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {

           $this->middleware('permission:channel-list', ['only' => ['index']]);
           $this->middleware('permission:channel-add', ['only' => ['create','store']]);
           $this->middleware('permission:channel-edit', ['only' => ['edit','update']]);
           $this->middleware('permission:channel-delete', ['only' => ['destroy']]);
           $this->middleware('permission:channel-export', ['only' => ['export']]);
    }
    public function index()
    {
        $channel = Channel::query();
        $channel = $channel->latest()->paginate(25);

        return view('Admin.channel.index',compact('channel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.channel.create');
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
        $channels=Channel::create($request->all());
        alert()->success('اطلاعات با موفقیت ثبت شد','پیغام سیستم')->persistent("تایید");
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Channel  $channel
     * @return \Illuminate\Http\Response
     */
    public function show(Channel $channel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Channel  $channel
     * @return \Illuminate\Http\Response
     */
    public function edit(Channel $channel)
    {
            return view('Admin.channel.edit', compact(['channel']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Channel  $channel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Channel $channel)
    {
        $request->merge(['active' => $request->has('active')]);
        $channel->update($request->all());
        alert()->success('ویرایش  با موفقیت انجام شد', 'پیغام سیستم')->persistent('تایید');
        return redirect(route('admin.channel.index'));
    }
    public function export(Channel $channel)
    {
        return Excel::download(new ChannelExport($channel), 'Channel.xlsx');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Channel  $channel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Channel $channel)
    {
    $channel->delete();
     alert()->success('حذف با موفقیت انجام شد','پیغام سیستم')->persistent('تایید');
     return back();
    }
}
