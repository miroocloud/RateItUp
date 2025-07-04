<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'role_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Relasi ke model Role
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function places()
    {
        return $this->hasMany(Place::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function checkins()
    {
        return $this->hasMany(Checkin::class);
    }

    public function reviewComments()
    {
        return $this->hasMany(ReviewComment::class);
    }

    public function reviewRatings()
    {
        return $this->hasMany(ReviewRating::class);
    }

    public function favorites()
    {
        return $this->belongsToMany(Place::class, 'favorites');
    }

    public function isAdmin()
    {
        return optional($this->role)->name === 'administrator';
    }

    public function isUser()
    {
        return $this->role === 'user';
    }
}
