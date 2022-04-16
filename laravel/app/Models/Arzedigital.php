<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arzedigital extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'name_en',
        'symbol',
        'active'
    ];
    public function realtimechart()
    {
        return $this->hasOne(RealTimeChart::class);
    }
}
