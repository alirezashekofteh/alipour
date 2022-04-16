<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Pishran\LaravelPersianSlug\HasPersianSlug;
use Spatie\Sluggable\SlugOptions;

class Category extends Model
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
        'name' , 'parent' , 'type','pic','content','slug','picslide','vip','title','description'
    ];
    public function child()
    {
        return $this->hasMany(Self::class,'parent','id');
    }
    public function parents()
    {
        return $this->belongsTo(Self::class,'parent','id');
    }
    public function post()
    {
    return $this->belongsToMany(Post::class);
    }
    public function children()
    {
        return $this->child()->with('children');
    }
    public function Sahams()
    {
        return $this->hasMany(Saham::class);
    }

    public function descendants()
{
    $collection = new \Illuminate\Support\Collection();

    foreach ($this->child as $chi) {
        $collection->add($chi);
        $collection = $collection->merge($chi->descendants());
    }

    return $collection;
}
}
