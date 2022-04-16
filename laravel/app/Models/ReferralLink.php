<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ReferralLink extends Model
{
    protected $fillable = ['user_id', 'referral_term_id'];

    protected static function boot()
    {
        parent::boot();
        static::creating(function (ReferralLink $model) {
            $model->generateCode();
        });
    }

    private function generateCode()
    {
        $this->code = (string)Str::uuid();
    }

    public static function getReferral($user, $term)
    {
        return static::firstOrCreate([
            'user_id' => $user->id,
            'referral_term_id' => $term->id
        ]);
    }

    public function getLinkAttribute()
    {
        return route('term.purchase',$this->term->slug) . '?ref=' . $this->code;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function term()
    {
        // TODO: Check if second argument is required
        return $this->belongsTo(Term::class, 'referral_term_id');
    }

    public function relationships()
    {
        return $this->hasMany(ReferralRelationship::class);
    }

}