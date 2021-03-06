<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'percent',
        'expired_at'
    ];
    protected $casts = [
        'expired_at' => 'datetime',
    ];
    public function terms()
    {
        return $this->morphedByMany(Term::class, 'discountable');
    }
}
