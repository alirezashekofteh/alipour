<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use App\Models\Channel;
use App\Models\ChannelUser;
use App\Models\Download;
use Illuminate\Http\Request;
use App\Models\Term;
use App\Models\User;
use App\Models\Video;
use App\Models\Order;
use App\Models\Wallet;
use Illuminate\Support\Facades\Auth;
Use Illuminate\Support\Carbon;

class PanelController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    public function index()
    {
        return view('Front.panel.index');
    }
    public function updateprofile(Request $request)
    {
        Auth::user()->update($request->all());
        alert()->success('ویرایش  با موفقیت انجام شد', 'پیغام سیستم')->persistent('تایید');
        return redirect(route('panel.profile'));
    }
    public function orders()
    {
        $orders = auth()->user()->order()->where('status', 1)->get();
        return view('Front.panel.orders', compact('orders'));
    }
    public function setting()
    {
        $channels=Channel::where('active','1')->get();
        return view('Front.panel.setting',compact('channels'));
    }
    public function settingsave(Request $request)
    {
        $notifacation = $request->get('notifacation');
    
        foreach ($notifacation as $key=>$item) {
            $channel=ChannelUser::find($key);
            $channel->notifacation=$item;
            $channel->save();
           
        }
        return back();
    }
    public function newticket()
    {
        return view('Front.panel.new-ticket');
    }
    public function ticketcreat(Request $request)
    {

        $tikcet=Auth::user()->tickets()->create($request->all());
        $request->merge(['parent' => $tikcet->id]);
        $tikcet=Auth::user()->tickets()->create($request->all());
        alert()->success('ثبت  با موفقیت انجام شد', 'پیغام سیستم')->persistent('تایید');
        return redirect(route('panel.new.ticket'));
    }
    public function tickets()
    {

        $tikcets=Auth::user()->tickets()->where('parent','0')->latest()->get();
        return view('Front.panel.tickets', compact('tikcets'));

    }
    public function order(Term $term)
    {
        $order=auth()->user()->order()->where('status', '1')->where('term_id', $term->id)->first();
        $termcat = $term->termcats()->Orderby('tartib','ASC')->get();
        return view('Front.panel.order', compact('termcat', 'term','order'));
    }
    public function orderghavanin(Order $order , Request $request)
    {
        $order->update(
            ['ghavanin'=> $request->has('ghavanin')]
        );
        return back();
    }
    public function channel()
    {
        $channels=Channel::where('active','1')->get();
        return view('Front.panel.channel', compact('channels'));
    }
    public function channelview(Channel $channel)
    {
        $mem=auth()->user()->Channels()->where('channel_id', $channel->id)->where('expire_at', '>', Carbon::now())->first();
        $pins=$channel->contents()->where('pin',1)->first();
        $contents=$channel->contents()->where('active','1')->latest()->get();
        return view('Front.panel.channelview', compact(['channel','contents','pins','mem']));
    }
    public function profile()
    {
        return view('Front.panel.profile');
    }
    public function video(Term $term, Video $video)
    {
        $next = $video->next();
        $previous = $video->previous();
        $termcat = $term->termcats()->get();
        return view('Front.panel.video', compact(['term', 'video','next','previous','termcat']));
    }

    public function subscription()
    {
        return view('Front.panel.subs');
    }
    public function convertfatoen()
    {
        $users = User::all();
        foreach ($users as $user) {
            $data['mobile'] = faTOen($user->mobile);
            $user->update($data);
        }
    }
    public function chargewallet()
    {
       return view('Front.panel.chargewallet');
    }
    public function downloadfile(Term $term,Download $download)
    {
        return \Illuminate\Support\Facades\Storage::download($download->file);
    }
    public function download(Term $term)
    {
        return view('course.download', compact('term'));
    }
    public function savegoftino(Request $request)
    {
        if($request->type=='order')
        {
            $order=Order::find($request->order_id);
            if($order->goftino==null OR $order->goftino==1)
            {
            $order->goftino=$request->goftino;
            $order->save();
            }
        }
        if($request->type=='channel')
        {
            $order=ChannelUser::find($request->order_id);
            if($order->goftino==null OR $order->goftino==1)
            {
            $order->goftino=$request->goftino;
            $order->save();
            }
        }
       
    }
    public function termgoftino(Request $request,Term $term)
    {
       $order= auth()->user()->order()->where('status', '1')->where('term_id', $term->id)->first();
        return view('Front.panel.supportterm',compact('term','order'));
    }
    public function expire(Request $request)
    {
        $orders=Order::whereNull('expire_support')->get();
        foreach($orders as $order)
        {
        $order->expire_support=$order->created_at->addDays(30);
        $order->save();
        }
    }
    public function installments(Request $request)
    {
        $wallets = Wallet::where('installments','>','0')->where('amount','>',0)->where('status',0)->where('user_id',auth()->user()->id)->get();
        return view('Front.panel.installments', compact('wallets'));
    }
    
}
