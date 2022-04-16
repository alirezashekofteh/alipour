<?php
namespace App\Exports;
use App\Models\Order;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class OrdersExport implements FromView
{
    public function view(): View
    {
        $orders = Order::query();

        if (request('date_start')) {
            $orders->whereBetween('created_at', [request('date_start'), request('date_end')]);
        }
        $orders=$orders->where('status',1);
        $orders = $orders->latest()->get();
        return view('Admin.orders.excel', compact('orders'));
    }
}
