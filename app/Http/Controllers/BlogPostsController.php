<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        // Get all posts
        $posts = BlogPost::orderBy('id', 'DESC')->paginate(5);

        // Return results with pagination, give the header title
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
        // Verify that the user is authenticated
        if ( ! Auth::check() ) {
            abort(401);
        }

        // Show the view
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
        // Verify that the user is authenticated
        if ( ! Auth::check() ) {
            abort(401);
        }

        // Form validation
        $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        // Create the blog post
        $id = BlogPost::create([
            'author_id' => Auth::id(),
            'title'     => $request->input('title'),
            'body'      => $request->input('body')
        ])->id;

        // Show the created blog post view
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
        // Retrieve the requested blog post
        $post = BlogPost::findOrFail($id);

        // Show the view with the blog post
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
        // Verify that the user is authenticated
        if ( ! Auth::check() ) {
            abort(401);
        }

        // Retrieve the requested blog post
        $post = BlogPost::findOrFail($id);

        // Show the view with the blog post
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
        // Verify that the user is authenticated
        if ( ! Auth::check() ) {
            abort(401);
        }

        // Validate the form
        $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        // Find the requested blog post
        $post = BlogPost::findOrFail($id);

        // Update the blog post
        $post->update([
            'author_id' => 1,
            'title'     => $request->input('title'),
            'body'      => $request->input('body')
        ]);

        // Show the view with the created blog post
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
        // Verify that the user is authenticated
        if ( ! Auth::check() ) {
            abort(401);
        }

        // Retrieve the requested blog post and delete it
        BlogPost::findOrFail($id)->delete();

        // Redirect to the main blog page
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
        // Store the query
        $query = $request->input('query');

        // Search the database for posts matching the query
        $posts = BlogPost::where('body', 'LIKE', "%{$query}%")->paginate(5);
        
        // Return the view with the matching blog posts
        return view('blog.allPostsWithPagination')->with([
            'posts' => $posts, 
            'headerType' => 'search',
            'query' => $query
        ]);
    }
}
