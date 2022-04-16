<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuAdmin extends Model
{
    use HasFactory;
    protected $fillable = [
        'name' , 'panel' , 'route' , 'parent' , 'pic','tartib','view','gate','link'
    ];
    public function child()
    {
        return $this->hasMany(MenuAdmin::class,'parent','id');
    }
    public function parents()
    {
        return $this->belongsTo(MenuAdmin::class,'parent','id');
    }
}
