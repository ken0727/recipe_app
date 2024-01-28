<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Post;
use App\Models\BookmarkRecipe;
use Illuminate\Support\Facades\DB;

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

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    // ユーザーを削除する前に、関連するデータも削除する
protected static function boot()
    {
        parent::boot();

        static::deleting(function ($user) {
            // SQLiteの場合はPRAGMAを使用する
            if (DB::connection() instanceof \Illuminate\Database\SQLiteConnection) {
                DB::statement('PRAGMA foreign_keys=off;');
            } else {
                // MySQLなどの他のデータベースの場合はSET FOREIGN_KEY_CHECKSを使用
                DB::statement('SET FOREIGN_KEY_CHECKS=0');
            }

            // ユーザーに紐づく投稿も削除
            $user->posts()->delete();

            // ユーザーに紐づくブックマークも削除
            $user->bookmarkRecipes()->delete();

            // ユーザーがお気に入りしたデータも削除
            $user->favorites()->delete();

            // ユーザーがいいねしたデータも削除
            $user->likes()->delete();

            // 外部キー制約を再度有効にする
            if (DB::connection() instanceof \Illuminate\Database\SQLiteConnection) {
                DB::statement('PRAGMA foreign_keys=on;');
            } else {
                // MySQLなどの他のデータベースの場合はSET FOREIGN_KEY_CHECKSを使用
                DB::statement('SET FOREIGN_KEY_CHECKS=1');
            }
        });
    }
}