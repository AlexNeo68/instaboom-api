<?php

namespace App\Services\Post;

use App\Models\Post;
use App\Models\Post as PostModel;
use App\Services\Post\Data\PostStoreData;
use App\Services\Post\Data\PostUpdateData;
use App\Services\Post\Data\UpdatePostData;
use Illuminate\Http\UploadedFile;

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


    public function store(PostStoreData $data)
    {
        return auth()->user()->posts()->create([
            'photo' => $this->uploadPhoto($data->photo),
            'description' => $data->description,
        ]);
    }
    public function update(PostUpdateData $data, Post $post): Post
    {
        $post->update($data->toArray());
        return $post;
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return response()->noContent();
    }

    private function uploadPhoto(UploadedFile $image):string
    {
        $path = $image->storePublicly('posts');

        return config('app.url')."/storage/$path";
    }

}
