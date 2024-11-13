<?php

namespace App\Http\Controllers\Api\Post;

use App\Facade\PostFacade;
use App\Http\Controllers\Controller;
use App\Http\Requests\Post\PostIndexRequest;
use App\Http\Requests\Post\PostStoreRequest;
use App\Http\Requests\Post\PostUpdateRequest;
use App\Http\Resources\Post\FeedResource;
use App\Http\Resources\Post\PostDetailResource;
use App\Models\Post;
use App\Models\Post as PostModel;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PostIndexRequest $request)
    {
        return response()
            ->json([
                'posts' => FeedResource::collection(PostFacade::feed($request->limit(), $request->offset())),
                'total' => PostFacade::totalFeedPosts()
            ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostStoreRequest $request)
    {
        return new PostDetailResource(PostFacade::store($request->data()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return new PostDetailResource($post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostUpdateRequest $request, Post $post)
    {
        return new PostDetailResource(PostFacade::update($request->data(), $post));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        return PostFacade::destroy($post);
    }

    public function like(Post $post)
    {
        return response()->json([
            'state' => $post->like(),
        ]);
    }



}
