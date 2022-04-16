<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionOption extends Model
{
    use HasFactory;
    protected $fillable = [
        'name' , 'part' ,'value'
    ];
    public function question()
    {
        return $this->belongsTo(SurveyQuestion::class);
    }
}
