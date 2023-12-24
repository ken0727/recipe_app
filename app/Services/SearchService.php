<?php

namespace App\Services;

use App\Models\Post;
use App\Models\User;

class SearchService
{
    public function search($keyword, $model)
    {
        return $model::where('name', 'like', '%' . $keyword . '%')->get();
    }

    public function searchByUser($keyword, User $user)
    {
        return $user->posts()->where('name', 'like', '%' . $keyword . '%')->get();
    }

    public function searchBookmarks($keyword, User $user)
    {
        return $user->bookmarks()->where('name', 'like', '%' . $keyword . '%')->get();
    }
}
