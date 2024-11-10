<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    //chi tiết bài viết
    public function show($id)
    {
        //Lấy bài viết theo id
        $post = DB::table('posts')->find($id);
        if ($post == null) {
            return redirect(404);
        }
        return view('detail', compact('post'));
    }
    //Hiển thị bài viết theo danh mục
    public function list($id)
    {
        $posts = DB::table('posts')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->select(['posts.*', 'name'])
            ->where('category_id', $id)
            ->latest('id')
            ->paginate(8);
        return view('posts', compact('posts'));
    }

    //Form cập nhật
    public function edit($id)
    {
        $post = DB::table('posts')->find($id);

        return view('edit', compact('post'));
    }
    //Update
    public function update($id)
    {
        $post = DB::table('posts')->where('id', $id);
        if ($post) {
            //cập nhật
            $post->update([
                'title' => 'Update title',
                'description' => 'Update mô tả',
                'view' => 1000
            ]);
        }
    }

    //Delete
    public function destroy($id)
    {
        $post = DB::table('posts')->find($id);

        DB::table('posts')->delete($id);

        return redirect()->route('list-post', $post->category_id);
    }
}
