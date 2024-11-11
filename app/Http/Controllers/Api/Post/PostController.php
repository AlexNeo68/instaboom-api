<?php

namespace App\Http\Controllers\Api\Post;

use App\Facade\PostFacade;
use App\Http\Controllers\Controller;
use App\Http\Requests\Post\PostIndexRequest;
use App\Http\Resources\Post\FeedResource;
use App\Models\Post;
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
