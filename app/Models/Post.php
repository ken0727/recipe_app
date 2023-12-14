<?php

// app/Models/Post.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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



    
}
