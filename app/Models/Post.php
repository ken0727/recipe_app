<?php

// app/Models/Post.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Collection; // 追加
use Illuminate\Support\Facades\DB; // 追加

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
    return static::leftJoin('likes', 'posts.id', '=', 'likes.post_id')
        ->select('posts.*', DB::raw('COUNT(likes.id) as likes_count'))
        ->groupBy('posts.id', 'posts.name', 'posts.user_id','posts.image_path','posts.material','posts.procedure','posts.created_at','posts.updated_at')
        ->having('likes_count', '>', 0)
        ->orderByDesc('likes_count')
        ->orderBy('created_at')
        ->take(10)
        ->get();
}
    


}
