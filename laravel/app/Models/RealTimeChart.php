<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RealTimeChart extends Model
{
    use HasFactory;
    protected $fillable = [
        'symbol',
        'autosize',
        'theme',
        'locale',
        'enable_publishing',
        'style',
        'toolbar_bg',
        'withdateranges',
        'hide_side_tollbar',
        'allow_symbol_change',
        'studies',
    ];
    public function arzedigital()
    {
        return $this->belongsTo(Arzedigital::class);
    }
}
