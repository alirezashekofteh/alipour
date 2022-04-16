<?php
namespace App\Exports;
use App\Models\ChannelUser;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ChannelExport implements FromView
{
    public $channel;
    public function __construct($channel) {
        $this->channel = $channel;
    }
    public function view(): View
    {
        $channels = ChannelUser::query();

        $channels=$channels->where('channel_id',$this->channel->id);
        if (request('date_start')) {
            $channels->whereBetween('created_at', [request('date_start'), request('date_end')]);
        }
        $channels=$channels->where('expire_at','>',now());
        $channels = $channels->latest()->get();
        return view('Admin.channel.excel', compact('channels'));
    }
}
