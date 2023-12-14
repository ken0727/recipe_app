<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'image_path',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    //indexにuser_idをつける
        public function dashboardPath()
    {
        return '/index/' . $this->id;
    }

        public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function bookmarkRecipes()
{
    return $this->hasMany(BookmarkRecipe::class);
}

public function favoriteUsers()
{
    return $this->belongsToMany(User::class, 'favorites', 'user_id', 'favorited_user_id')->withTimestamps();
}
    // ユーザーがお気に入りした投稿を取得
    public function favorites(): HasMany
    {
        return $this->hasMany(Favorite::class, 'user_id');
    }

    



}
