<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TermContent extends Model
{
    use HasFactory;
    protected $fillable = [
        'name' , 'content' ,'pos','pic'
    ];
    public function term()
    {
        return $this->belongsTo(Term::class);
    }
}
