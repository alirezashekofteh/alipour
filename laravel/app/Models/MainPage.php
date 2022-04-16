<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainPage extends Model
{
    use HasFactory;
    protected $fillable = [
        'seotext'  , 'picmobile' , 'picdesk' ,'banner1','banner2','blogtext','description','title','countcamp'
    ];
}
