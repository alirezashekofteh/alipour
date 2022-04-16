<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory;
    protected $fillable = [
        'type' , 'amount','status','description','resnumber','parent','user_id','walletable_id' , 'walletable_type','installments','created_at','updated_at','code','agent'
    ];
    public function walletable()
    {
        return $this->morphTo();
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function agents()
    {
        return $this->belongsTo(User::class,'agent');
    }
     public function wallets()
    {
        return $this->morphMany(Wallet::class, 'walletable');
    }
}
