<?php
namespace App\Exports;
use App\Models\Wallet;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class WalletExport implements FromView
{
    public function view(): View
    {
        $wallet = Wallet::query();
        $wallet=$wallet->where('status',1)->where('amount','>',0)->where('type','credit');
        if ($keyword = request('date_start')) {
            $wallet->whereBetween('updated_at', [request('date_start'), request('date_end')]);
        }
        if ($keyword = request('agent')) {
            $wallet->where('agent',$keyword);
        }
        $wallet=$wallet->latest()->get();
        return view('Admin.wallet.excel', compact('wallet'));
    }
}
