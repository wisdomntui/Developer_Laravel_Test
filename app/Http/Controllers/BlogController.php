<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;

class BlogController extends Controller
{

    public function search(Request $request)
    {
        try {
            $query = Post::query();
            $posts = app(Pipeline::class)
                ->send($query)
                ->through([
                    \App\QueryFilter\Title::class,
                ])
                ->thenReturn();

            return $posts->get();
        } catch (\Throwable $th) {
            logger($th);
        }
    }

    /**
     * Fetch blog categories
     *
     * @param $blog
     */
    public static function getBlogCategory(Request $request, $blog)
    {
        try {
            $blog = Blog::find($blog);
            return response()->json(['categories' => $blog->categories()->get()]);
        } catch (\Throwable $th) {
            logger($th);
            return response()->json(['message' => "There has been an error"], 500);
        }
    }
}
