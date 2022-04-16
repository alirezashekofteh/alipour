<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['comment' , 'approved' , 'parent_id' ,'commentable_id' , 'commentable_type','name','email','user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function commentable()
    {
        return $this->morphTo();
    }
    public function getNameAttribute()
    {
        if (! $this->attributes['user_id']) {
            return $this->attributes['name'];
        }

        return $this->user->nf ;
    }
    public function parent()
    {
        return Comment::where('parent_id',$this->id)->get();
    }
}
