<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MembertimeChannel extends Model
{
    use HasFactory;
    protected $fillable = ['name' , 'channel_id' , 'cost','days','active'];
    public function channel()
    {
        return $this->belongsTo(Channel::class);
    }
    public function term()
    {
        return $this->belongsToMany(Term::class);
    }
}
