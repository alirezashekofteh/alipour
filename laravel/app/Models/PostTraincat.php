<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostTraincat extends Model
{
    use HasFactory;
    protected $fillable = ['traincat_id' , 'post_id' , 'tartib'];
    protected $table = 'post_traincat';
    public function post()
    {
        return $this->belongsTo(post::class);
    }
    public function traincat()
    {
        return $this->belongsTo(Traincat::class);
    }
}
