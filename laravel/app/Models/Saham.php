<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Pishran\LaravelPersianSlug\HasPersianSlug;
use Spatie\Sluggable\SlugOptions;

class Saham extends Model
{
    use HasFactory;
    use HasPersianSlug;
    public function getRouteKeyName()
    {
        return 'id';
    }
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug')
            ->doNotGenerateSlugsOnUpdate();
    }

    protected $fillable = [
        'name' , 'active' ,'content','pic','slug','category_id','title','description'
    ];
    public function tahlilsahmes()
    {
        return $this->hasMany(Tahlilsahme::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function metas()
    {
        return $this->morphMany(Meta::class, 'metaable');
    }
}
