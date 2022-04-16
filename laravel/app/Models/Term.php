<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Pishran\LaravelPersianSlug\HasPersianSlug;
use Spatie\Sluggable\SlugOptions;

class Term extends Model
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
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug')
            ->doNotGenerateSlugsOnUpdate();
    }

    protected $fillable = [
        'title', 'access', 'content', 'price', 'video', 'gift', 'slug', 'kavimo', 'pishniaz', 'content_buttom', 'support', 'off', 'pic','sath','eraye','poshtibani','teacher','vip','picslider','lifetime_minutes','referralcost','linkkharid','olgo','onvan','description','installments','sup_day','gift_price'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function videos()
    {
        return $this->hasMany(Video::class);
    }
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function getPicAttribute()
    {
        if (!$this->attributes['pic']) {
            return '/images/topblog9.jpg';
        }

        return $this->attributes['pic'];
    }
    public function getDiscountAttribute()
    {
        if (!$this->attributes['off']) {
            return '0';
        }
        $discount = ($this->attributes['off'] * 100) / $this->attributes['price'];
        return $discount;
    }
    public function termcontents()
    {
        return $this->hasMany(TermContent::class);
    }
    public function termcats()
    {
        return $this->hasMany(TermCat::class);
    }
    public function downloads()
    {
        return $this->hasMany(Download::class);
    }
    public function getPriceAttribute()
    {
        if (!auth()->user()->order()->where('term_id', $this->pishniaz)->where('status', 1)->count()) {
            return $this->attributes['price']-$this->off;
        } else {
            return $this->attributes['price'] - $this->gift - $this->off;
        }
    }
    public function scopePriceins($query,$user)
    {
        if (!$user->order()->where('term_id', $this->pishniaz)->where('status', 1)->count()) {
            return $this->attributes['price']-$this->off;
        } else {
            return $this->attributes['price'] - $this->gift - $this->off;
        }
    }
    public function Orginalprice()
    {
        return $this->attributes['price'];
    }
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
    public function questions()
    {
        return $this->morphMany(Question::class, 'questionable');
    }
    public function wallets()
    {
        return $this->morphMany(Wallet::class, 'walletable');
    }
    public function channel()
    {
        return $this->belongsToMany(MembertimeChannel::class);
    }
    public function getnameAttribute()
    {
        return $this->title ;
    }
    public function discount()      
    {
        return $this->morphToMany(Discount::class,'discountable');
    }
}
