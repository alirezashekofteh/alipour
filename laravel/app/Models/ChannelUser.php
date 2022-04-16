<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChannelUser extends Model
{
    use HasFactory;
    protected $fillable = ['user_id' , 'channel_id' , 'member_id','day','expire_at','notifacation','goftino'];
    protected $table = 'channel_user';
    protected $casts = [
        'expire_at' => 'datetime',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function channel()
    {
        return $this->belongsTo(Channel::class);
    }
}
