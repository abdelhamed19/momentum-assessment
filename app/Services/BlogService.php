<?php
namespace App\Services;

use App\Models\Post;
use Illuminate\Support\Facades\DB;

class BlogService
{

    public function createPost($data)
    {
        try {
            DB::beginTransaction();
            $post = Post::create($data);
            DB::commit();
            return $post;
        } catch (\Exception $e) {
            DB::rollBack();
            return false;
        }
    }
    public function updatePost($postId, $data)
    {
        try {
            DB::beginTransaction();
            $post = Post::find($postId);
            if (!$post) {
                return false;
            }
            $post->update($data);
            DB::commit();
            return $post;
        } catch (\Exception $e) {
            DB::rollBack();
            return false;
        }
    }
    public function deletePost($postId)
    {
        try {
            DB::beginTransaction();
            $post = Post::find($postId);
            if (!$post) {
                return false;
            }
            $post->delete();
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            return false;
        }
    }
    public function getPost($postId)
    {
        try {
            $post = Post::find($postId);
            if (!$post) {
                return false;
            }
            return $post;
        } catch (\Exception $e) {
            return false;
        }
    }
    public function getAllPosts($request)
    {
        try {
            $posts = Post::paginate($request->input('per_page', 10));
            return $posts;
        } catch (\Exception $e) {
            return [];
        }
    }
    public function getUserPosts($userId)
    {
        try {
            $posts = Post::where('user_id', $userId)->get();
            return $posts;
        } catch (\Exception $e) {
            return false;
        }
    }
}
