<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    protected $fillable = [
        'title' , 'content' ,'part','video','file','time_video','free','user_id','pic','kavimo','termcat_id','installments'
    ];
    public function term()
    {
        return $this->belongsTo(Term::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function termcat()
    {
        return $this->belongsTo(TermCat::class);
    }
    public function getPicAttribute()
    {
        if (! $this->attributes['pic']) {
            return '/images/topblog6.jpg';
        }

        return $this->attributes['pic'];
    }
    public function next(){
        return Video::where('term_id',$this->term_id)->where('id', '>', $this->id)->orderBy('id','asc')->first();

    }
    public  function previous(){
        // get previous  user
        return Video::where('term_id',$this->term_id)->where('id', '<', $this->id)->orderBy('id','desc')->first();

    }
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
