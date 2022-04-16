<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    use HasFactory;
    protected $fillable = [
        'active','name'
    ];
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    public function tickets()
    {
        return $this->hasmany(Ticket::class);
    }
}
