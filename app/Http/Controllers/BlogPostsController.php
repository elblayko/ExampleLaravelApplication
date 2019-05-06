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
        return view('blog.allPostsWithPagination')->with([
            'posts' => $posts,
            'headerType' => 'viewAll'
        ]);
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
        $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $input = $request->all();
        $id = BlogPost::create([
            'author_id' => 1,
            'title'     => $input['title'],
            'body'      => $input['body']
        ])->id;

        return redirect('/blog/' . $id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = BlogPost::findOrFail($id);
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
        $post = BlogPost::findOrFail($id);
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
        $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $post = BlogPost::findOrFail($id);
        $post->update([
            'author_id' => 1,
            'title'     => $request->input('title'),
            'body'      => $request->input('body')
        ]);

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
        BlogPost::findOrFail($id)->delete();
        $posts = BlogPost::orderBy('id', 'DESC')->paginate(5);
        return redirect('/blog');
    }

    /**
     * Display a listing of the resource matching search query.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $query = $request->input('query');
        $posts = BlogPost::where('body', 'LIKE', "%{$query}%")->paginate(5);
        
        return view('blog.allPostsWithPagination')->with([
            'posts' => $posts, 
            'headerType' => 'search',
            'query' => $query
        ]);
    }
}
