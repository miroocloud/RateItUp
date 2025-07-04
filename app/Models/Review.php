<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'place_id',
        'rating',
        'comment',
        'status'
    ];

    protected $casts = [
        'rating' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function place()
    {
        return $this->belongsTo(Place::class);
    }

    public function comments()
    {
        return $this->hasMany(ReviewComment::class);
    }

    public function ratings()
    {
        return $this->hasMany(ReviewRating::class);
    }

    public function approvedComments()
    {
        return $this->hasMany(ReviewComment::class)->approved();
    }

    public function getHelpfulRatingsCountAttribute()
    {
        return $this->ratings()->where('is_helpful', true)->count();
    }

    public function getNotHelpfulRatingsCountAttribute()
    {
        return $this->ratings()->where('is_helpful', false)->count();
    }

    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }
}
