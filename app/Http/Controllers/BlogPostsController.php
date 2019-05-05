<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BlogPost;

class BlogPostsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = BlogPost::orderBy('id', 'DESC')->paginate(5);
        return view('blog.allPostsWithPagination')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.createPost');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $blogPost = new BlogPost();
        $blogPost->author_id = 1;
        $blogPost->title = $request->postTitle;
        $blogPost->body = $request->postBody;
        $blogPost->save();

        return redirect('/blog');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = BlogPost::find($id);
        return view('blog.viewPost')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = BlogPost::find($id);
        return view('blog.editPost')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $post = BlogPost::find($id);
        $post->title = $input['postTitle'];
        $post->body = $input['postBody'];
        $post->save();

        return view('blog.viewPost')->with('post', $post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = BlogPost::find($id);
        $post->delete();

        $posts = BlogPost::orderBy('id', 'DESC')->paginate(5);
        return view('blog.allPostsWithPagination')->with('posts', $posts);
    }
}
