<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function test()
    {
        //Lấy tất cả dữ liệu
        // $posts = Post::all();
        //Lấy dữ liệu hạn chế
        // $posts = Post::query()->limit(9)->orderByDesc('id')->get();
        //Lấy 1 dữ liệu
        // $posts = Post::query()->find(100);

        // $posts = Post::query()->where("title", "LIKE", "%est%")->get();

        //Thêm dữ liệu
        // $cate = new Category();
        // $cate->name = "Test cate";
        // $cate->save();

        // Category::query()->create([
        //     'name' => "Test cate 2"
        // ]);

        // $categories = Category::all();

        //hasMany từ 1 category có thể lấy được các post thuộc category đó
        $cate = Category::query()->find(1);
        $posts = $cate->posts;

        //Từ 1 post có thể lấy được category của nó
        $post = Post::query()->find(1);
        $cate = $post->category;

        return $cate->name;
    }
}
