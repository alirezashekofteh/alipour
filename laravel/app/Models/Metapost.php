<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Metapost extends Model
{
    use HasFactory;
    protected $fillable = [
        'name' , 'content' ,'noe','tartib','meta','file','code','post_id'
    ];
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
