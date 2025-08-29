<?php

namespace App\Http\Controllers;

use App\Http\Resources\Blogs\BlogCollection;
use App\Http\Resources\Blogs\BlogResource;
use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function index() {
        $blogs = new BlogCollection(Blog::latest()->where('is_publish', true)->get());
        return $blogs;
    }

    public function all() {
        $this->checkIfAdmin();

        $blogs = new BlogCollection(Blog::latest()->get());
        return $blogs;
    }

    public function readBlog($id) {
        $blog = new BlogResource(Blog::find($id));

        return $blog;
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $is_publish = Auth::user()->role === 'admin' ? true : false;

        $blog = Blog::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'is_publish' => $is_publish,
            'user_id' => $request->user()->id,
        ]);

        return response()->json([
            'message' => 'Blog created successfully',
            'blog' => $blog
        ], 201);
    }

    public function edit($id) {
        $this->checkIfAdmin();

        return Blog::find($id);
    }

    public function update(Request $request, $id){
        $this->checkIfAdmin();

        $blog = Blog::find($id);
        $blog->update([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'is_publish' => $request->input('is_publish'),
        ]);

        return response()->json([
            'message' => 'Blog updated successfully',
            'blog' => $blog
        ], 201);
    }

    public function delete($id){
        $this->checkIfAdmin();

        $blog = Blog::find($id);
        $blog->delete();

        return response()->json([
            'message' => 'Blog deleted successfully',
        ], 201);
    }

    public function publish(Request $request, $id){
        $this->checkIfAdmin();

        $is_publish = $request->input('is_publish');

        $blog = Blog::find($id);
        $blog->update([
            'is_publish' => $is_publish,
        ]);

        return response()->json([
            'message' => 'Blog published successfully',
            'blog' => $blog,
        ], 201);
    }

    public function checkIfAdmin() {
        if(Auth::user()->role !== 'admin'){
            abort(403, "Request Denied");
        }
    }
}
