<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentChannel extends Model
{
    use HasFactory;
    protected $fillable = ['name' , 'file' , 'active','content','type','user_id','pin','parent'];
    public function channel()
    {
        return $this->belongsTo(Channel::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function parents()
    {
        return $this->belongsTo(Self::class,'parent','id');
    }
}
