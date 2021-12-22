<?php

namespace App\Http\Controllers\api;
use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends ApiResponseController
{

    public function index()
    {
        $posts = Post::
        join('categories', 'categories.id', '=', 'posts.category_id')->
        select('posts.*', 'categories.title as category')->
        orderBy('posts.created_at', 'desc')->paginate(1);
        return $this->successResponse($posts);
    }

    public function show(Post $post)
    {
        $post->category;
        return $this->successResponse($post);
        //return response()->json(array("data" => $post, "code" => 200, "msj"=> ""));

    }

    public function category(Category $category)
    {
        return $this->successResponse($category->post);

    }
}
