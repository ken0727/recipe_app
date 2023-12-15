<?php

// app/Models/Post.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Collection; // 追加

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'material', 'procedure', 'image_path','user_id'];//user_idを追加

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function index()
    {
        // データベースからすべての投稿を取得
        $posts = Post::all();

        return view('posts.index', ['posts' => $posts]);
    }


    // この投稿に対するいいねのリレーション
    public function likes(): HasMany
    {
        return $this->hasMany(Like::class);
    }

    // 特定のユーザーがこの投稿をいいねしているかどうかを判定
    public function isLikedBy(User $user): bool
    {
        return $this->likes()->where('user_id', $user->id)->exists();
    }

    // この投稿のいいね数を取得
    public function getLikeCountAttribute(): int
    {
        return $this->likes()->count();
    }

    // いいねのランキングを取得（例: 上位5件）
    public static function getRanking(): Collection
    {
        return static::withCount('likes')
            ->where('likes_count', '>', 0) // いいねが0でないものを抽出
            ->orderByDesc('likes_count')
            ->orderBy('created_at') // 追加: 作成日時でソート（同じいいね数の場合に古い方が上にくるように）
            ->take(10) // 上位5件のみ取得
            ->get();
    }

    
}
