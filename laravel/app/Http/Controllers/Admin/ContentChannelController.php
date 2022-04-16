<?php

namespace App\Http\Controllers\Admin;

use App\Models\ContentChannel;
use App\Models\Channel;
use App\Http\Controllers\Controller;
use App\Notifications\SendNotiChannel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Notification;
class ContentChannelController extends Controller
{
    public function __construct()
    {
        $this->middleware(['admin.auth', 'channelmanager']);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Channel $channel)
    {
       $content=$channel->contents();
       if ($keyword = request('search')) {
        // $post->where('name', 'LIKE', "%{$keyword}%")->orWhere('content', 'LIKE', "%{$keyword}%")->orWhere('fullcontent', 'LIKE', "%{$keyword}%");
        $content=$content->where('name', 'LIKE', "%{$keyword}%");
    }
    $content=$content->latest()->paginate(25);

       return view('Admin.channel.contents.index',compact('content','channel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Channel $channel,Request $request)
    {
        $parent=0;
        if($request->has('parent'))
        {
        $parent= $request->get('parent'); 
        }
        return view('Admin.channel.contents.create',compact('channel','parent'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Channel $channel)
    {
        $request->merge(['active' => $request->has('active')]);
        $request->merge(['user_id' => auth()->user()->id]);
        $request->merge(['parent' => $request->get('parent')]); 
        $channel->contents()->create($request->all());
if($request->has('send'))
{
    $users=$channel->users()->wherePivot('expire_at','>',Carbon::now())->wherePivot('notifacation','1')->get();
    
    Notification::send($users, new SendNotiChannel($channel));
}
        alert()->success('اطلاعات با موفقیت ثبت شد','پیغام سیستم')->persistent("تایید");
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ContentChannel  $contentChannel
     * @return \Illuminate\Http\Response
     */
    public function show(ContentChannel $contentChannel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ContentChannel  $contentChannel
     * @return \Illuminate\Http\Response
     */
    public function edit(Channel $channel,ContentChannel $content)
    {
        if($content->user_id==auth()->user()->id)
        {
        return view('Admin.channel.contents.edit',compact('channel','content'));
        }
        abort(403);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ContentChannel  $contentChannel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Channel $channel, ContentChannel $content)
    {
        $request->merge(['active' => $request->has('active')]);
        $request->merge(['pin' => $request->has('pin')]);
        if($request->has('pin'))
        {
            $pins=ContentChannel::where('pin',1);
            $pins->update(['pin'=>0]);
        }
        $content->update($request->all());
        alert()->success('ویرایش  با موفقیت انجام شد','پیغام سیستم')->persistent('تایید');
        return redirect(route('admin.channel.content.index',$channel));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ContentChannel  $contentChannel
     * @return \Illuminate\Http\Response
     */
    public function destroy( Channel $channel,ContentChannel $content)
    {
        $content->delete();
        alert()->success('حذف با موفقیت انجام شد','پیغام سیستم')->persistent('تایید');
        return back();
    }
}
