<?php

// app/Models/Favorite.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'favorited_user_id',
    ];

    // ユーザーとのリレーション
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // お気に入りされるユーザーとのリレーション
    public function favoritedUser()
    {
        return $this->belongsTo(User::class, 'favorited_user_id');
    }
}
