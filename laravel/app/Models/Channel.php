<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    use HasFactory;
    protected $fillable = ['name' , 'pic' , 'active'];

    public function membertimechannels()
    {
        return $this->hasMany(MembertimeChannel::class);
    }
    public function contents()
    {
        return $this->hasMany(ContentChannel::class);
    } 
    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('expire_at','id','notifacation','goftino');
    }
    public function managers()
    {
        return $this->belongsToMany(User::class, 'channel_manager', 'channel_id', 'user_id');
    }
   
}
