<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Sanctum\HasApiTokens;
class User extends Authenticatable
{
    use HasApiTokens ,HasFactory, Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'family',
        'password',
        'email_verified_at',
        'superuser',
        'staff',
        'mobile',
        'expire_at',
        'type',
        'refcode',
        'percent',
        'parent',
        'goftino',
        'loginid',
        'email'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function superuser()
    {
        return $this->superuser;
    }
    public function staff()
    {
        return $this->staff;
    }
    public function post()
    {
        return $this->hasMany(post::class);
    }
    public function term()
    {
        return $this->hasMany(Term::class);
    }
    public function video()
    {
        return $this->hasMany(Video::class);
    }
    public function order()
    {
        return $this->hasMany(Order::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function validorder()
    {
        return $this->order->where('status', 1);
    }
    public function getnfAttribute()
    {
        return $this->name . ' ' . $this->family;
    }
    public function transactions()
    {
        return $this->hasMany(Wallet::class);
    }

    public function validTransactions()
    {
        return $this->transactions()->where('status', 1);
    }
    public function credit()
    {
        return $this->validTransactions()
            ->where('type', 'credit')
            ->sum('amount');
    }
    public function addcredit($amunt)
    {
        return $this->transactions()->
        create([
            'type' => 'credit',
            'amount' => $amunt,
            'status' => '1',
        ]);
    }
    public function debit()
    {
        return $this->validTransactions()
            ->where('type', 'debit')
            ->sum('amount');
    }
    public function balance()
    {
        return $this->credit() - $this->debit();
    }
    public function allowWithdraw($amount): bool
    {
        return $this->balance() >= $amount;
    }
    public function activeCode()
    {
        return $this->hasMany(ActiveCode::class);
    }
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
    public function Channels()
    {
        return $this->belongsToMany(Channel::class)->withPivot('expire_at','id','notifacation','goftino');
    }
    public function channelmanag()
    {
        return $this->belongsToMany(Channel::class, 'channel_manager', 'user_id', 'channel_id');
    }
    public function getPicAttribute()
    {
        if (! $this->attributes['pic']) {
            return '/assets/images/man.png';
        }

        return $this->attributes['pic'];
    }
    public function getReferrals()
{
    return Term::all()->map(function ($term) {
        return ReferralLink::getReferral($this, $term);
    });
}
}

