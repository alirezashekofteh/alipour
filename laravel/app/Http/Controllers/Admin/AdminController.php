<?php

namespace App\Http\Controllers\Admin;

use App\Exports\WalletExport;
use App\Http\Controllers\Controller;
use App\Models\ChannelUser;
use App\Models\Order;
use App\Models\User;
use App\Models\Wallet;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{
    public function __construct()
    {

           $this->middleware('permission:installment-list', ['only' => ['installments']]);
           $this->middleware('permission:installment-delete', ['only' => ['destroy']]);
            $this->middleware('permission:payment-list', ['only' => ['wallet']]);
    }

    public function index()
    {
        $orders = Order::query();
        $orders=$orders->where('status',1)->where('description','online');
        $price=$orders->sum('price');
        $count=$orders->count();
        $users=User::all()->count();
        return view('Admin.blank',compact(['orders','price','count','users']));
    }
    public function wallet()
    {
        $wallet = Wallet::query();
        $wallet=$wallet->where('status',1)->where('amount','>',0)->where('type','credit');
        if ($keyword = request('date_start')) {
            $wallet->whereBetween('updated_at', [request('date_start'), request('date_end')]);
        }
        if ($keyword = request('agent')) {
            $wallet->where('agent',$keyword);
        }
        $wallet=$wallet->latest()->paginate(50);
        return view('Admin.userwallet.wallet',compact('wallet'));
    }
     public function wallets()
    {
        $wallet = Wallet::query();
        $wallet=$wallet->where('status',1)->where('amount','>',0)->where('type','credit')->where('agent','>','0')->where('walletable_type','App\Models\Term');
        $wallet=$wallet->latest()->get();
        foreach($wallet as $w)
        {
         $order = Order::query();
        $order=$order->where('status',1)->where('term_id',$w->walletable_id)->where('user_id',$w->user_id)->where('agent','0')->first();
        if($order)
        {
            $order->agent=$w->agent;
            $order->save();
        }
        }

    }
    public function installments()
    {
        $wallet = Wallet::query();
        $wallet=$wallet->where('status',0)->where('amount','>',0)->where('installments','>',0);
        if ($keyword = request('search'))
        {
            $wallet->where('id', 'LIKE', "%{$keyword}%");
        }
        $wallet=$wallet->latest()->paginate(50);
        return view('Admin.userwallet.installments',compact('wallet'));
    }
    public function destroy(Wallet $wallet)
    {
        $wallet->delete();
        alert()->success('حذف با موفقیت انجام شد', 'پیغام سیستم')->persistent('تایید');
        return back();
    }
    public function tamdiddoreh()
    {
        $orders = Order::whereIn('term_id', array(26, 25, 24,23,22,21,29,28,27))->where('expire_support','<',now()->subDays(30))->where('created_at','<',now()->subDay())->where('status',1)->get();
        foreach($orders as $order)
        {
        $order->expire_support=now()->addDays(30);
        $order->save();
        }

    }
    public function tamdidchannel()
    {
        $orders = ChannelUser::where('channel_id', 7)->where('expire_at','>',now()->subDays(21))->get();
        foreach($orders as $order)
        {
            if($order->expire_at < now())
            {
                $order->expire_at=now()->addDays(90);
                $order->save();
            }
            else
            {
                $order->expire_at=$order->expire_at->addDays(90);
                $order->save();
            }
      
        }

    }
    public function exportwallet()
    {
        return Excel::download(new WalletExport, 'wallet.xlsx');
    }
}
