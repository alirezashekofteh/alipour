<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyQuestion extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];
    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }
    public function options()
    {
      return $this->hasMany(QuestionOption::class);
    }
}
