<?php

namespace App\Services\Post;

class PostService
{

    public function feed(int $limit = 10, int $offset = 0)
    {
        return auth()
            ->user()
            ->feedPosts()
            ->limit($limit)
            ->offset($offset)
            ->orderByDesc('id')
            ->get();
    }

    public function totalFeedPosts():int
    {
        return auth()->user()->feedPosts()->count();
    }

}
