<?php

namespace App\Http\Controllers\Admin;

use App\Exports\OrdersExport;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {

           $this->middleware('permission:order-list', ['only' => ['index']]);
           $this->middleware('permission:order-excel', ['only' => ['export']]);
           $this->middleware('permission:order-access', ['only' => ['Storeorder','changeStatusOrder']]);
    }
    public function index()
    {

        $orders = Order::query();

        if ($keyword = request('date_start')) {
            $orders->whereBetween('created_at', [request('date_start'), request('date_end')]);
        }
         if ($keyword = request('agent')) {
            $orders->where('agent',$keyword);
        }
        $orders=$orders->where('status',1);
        $price=$orders->sum('price');
        $count=$orders->count();
        $orders = $orders->latest()->paginate(25);
        $request=request()->all();
        return view('Admin.orders.index', compact(['orders','request','price','count']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
    public function check()
    {
        $orders = Order::where('status', 1)->get();

        foreach ($orders as $order) {
            if (strlen($order->resnumber) == 36) {
                $order->update([
                    'description' => 'online',
                ]);
            } else {
                $order->update([
                    'description' => 'wallet',
                ]);
            }
        }
    }
    public function export()
    {
        return Excel::download(new OrdersExport, 'Order.xlsx');
    }
    public function changeStatusOrder(Request $request)

    {

        $order = Order::find($request->order_id);
        $order->status = $request->status;
        $order->save();
        return response()->json(['success'=>'تغییرات با موفقیت ذخیره شد.']);

    }
    public function Storeorder(User $user,Request $request)
    {
        $order = $user->order()->create([
            'resnumber' => 0,
            'order_id' => $request->order,
            'price' => 0,
            'status' => 1,
            'description'=>'hand',
        ]);
        alert()->success('اطلاعات با موفقیت ثبت شد','پیغام سیستم')->persistent("تایید");
        return back();
    }
}
