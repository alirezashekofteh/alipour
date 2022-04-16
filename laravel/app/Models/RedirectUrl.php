<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RedirectUrl extends Model
{
    use HasFactory;
    protected $fillable = [
        'oldurl' , 'newurl' ,'active','type'
    ];
}
