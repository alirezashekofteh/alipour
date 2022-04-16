<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $casts = [
        'expire_support' => 'datetime',
    ];
    protected $fillable = [
        'price' , 'resnumber' ,'status','term_id','description','ghavanin','installments','user_id','expire_support','agent'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function agents()
    {
        return $this->belongsTo(User::class,'agent','id');
    }
    public function term()
    {
        return $this->belongsTo(Term::class);
    }
}
