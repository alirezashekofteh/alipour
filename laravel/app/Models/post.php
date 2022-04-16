<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Pishran\LaravelPersianSlug\HasPersianSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;

class post extends Model
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
        'name' , 'active' ,'content','comment','pic','fullcontent','noti','slug','type','video','cover','title','description','user_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function category()
    {
        return $this->belongsToMany(Category::class);
    }
    public function metapost()
    {
       return $this->hasMany(Metapost::class);
    }
    public function getPicAttribute()
    {
        if (! $this->attributes['pic']) {
            return '/images/topblog5.jpg';
        }

        return $this->attributes['pic'];
    }
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
    public function traincat()
    {
        return $this->belongsToMany(Traincat::class);
    }
}
