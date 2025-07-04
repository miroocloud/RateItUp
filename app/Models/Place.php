<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'address',
        'city',
        'phone',
        'opening_hours',
        'price_range',
        'specialties',
        'category_id',
        'user_id',
        'image',
        'status'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function checkins()
    {
        return $this->hasMany(Checkin::class);
    }

    public function favoritedBy()
    {
        return $this->belongsToMany(User::class, 'favorites');
    }

    public function getAverageRatingAttribute()
    {
        return $this->reviews()->published()->avg('rating') ?? 0;
    }

    public function getTotalReviewsAttribute()
    {
        return $this->reviews()->published()->count();
    }

    public function getTotalCheckinsAttribute()
    {
        return $this->checkins()->count();
    }

    public function getRecentCheckinsAttribute()
    {
        return $this->checkins()
            ->with('user')
            ->orderBy('checked_in_at', 'desc')
            ->limit(5)
            ->get();
    }

    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    public function scopeByCategory($query, $categoryId)
    {
        if ($categoryId && $categoryId !== 'all') {
            return $query->where('category_id', $categoryId);
        }
        return $query;
    }

    public function scopeByCity($query, $city)
    {
        if ($city && $city !== 'all') {
            return $query->where('city', $city);
        }
        return $query;
    }

    public function scopeSearch($query, $search)
    {
        if ($search) {
            return $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('city', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }
        return $query;
    }
}
