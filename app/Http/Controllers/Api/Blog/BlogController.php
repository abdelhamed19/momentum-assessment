<?php

namespace App\Http\Controllers\Api\Blog;

use App\Http\Requests\Api\Blog\UpdatePostRequest;
use Illuminate\Http\Request;
use App\Services\BlogService;
use App\Traits\ResponseTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Blog\CreatePostRequest;
use App\Http\Resources\Blog\PostCollection;
use App\Http\Resources\Blog\PostResource;

class BlogController extends Controller
{
    use ResponseTrait;
    private $blogService;
    public function __construct(BlogService $blogService)
    {
        $this->blogService = $blogService;
    }
    public function index(Request $request)
    {
        $posts = $this->blogService->getAllPosts($request);
        return $this->success(
            'Posts retrieved successfully',
            200,
            PostCollection::make($posts)
        );
    }
    public function show($postId)
    {
        $post = $this->blogService->getPost($postId);
        if (!$post) {
            return $this->error(
                'Post not found',
                404
            );
        }
        return $this->success(
            'Post retrieved successfully',
            200,
            PostResource::make($post)
        );
    }
    public function store(CreatePostRequest $request)
    {
        $data = $request->validated();
        $post = $this->blogService->createPost($data);
        if (!$post) {
            return $this->error(
                'Post creation failed',
                400
            );
        }
        return $this->success(
            'Post created successfully',
            201,
            PostResource::make($post)
        );
    }
    public function update(UpdatePostRequest $request, $postId)
    {
        $data = $request->validated();
        $post = $this->blogService->updatePost($postId, $data);
        if (!$post) {
            return $this->error(
                'Post update failed',
                400
            );
        }
        return $this->success(
            'Post updated successfully',
            200,
            PostResource::make($post)
        );
    }
    public function destroy($postId)
    {
        if (!$this->blogService->deletePost($postId)) {
            return $this->error(
                'Post deletion failed',
                400
            );
        }
        return $this->success(
            'Post deleted successfully',
            200,
            []
        );
    }
}
