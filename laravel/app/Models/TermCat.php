<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TermCat extends Model
{
    use HasFactory;
    protected $fillable = [
        'name' ,'tartib'
    ];
    public function term()
    {
        return $this->belongsTo(Term::class);
    }
    public function videos()
    {
        return $this->hasMany(Video::class,'termcat_id');
    }

}
