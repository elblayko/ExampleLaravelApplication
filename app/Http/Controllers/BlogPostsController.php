<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\BlogPost;
use App\User;

class BlogPostsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieve the resource.
        $posts = BlogPost::with(['author'])
            ->paginate(10);

        // Show the view.
        return view('blog.viewMultiplePosts')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Verify that the user is authenticated.
        if ( ! Auth::check() ) {
            abort(401);
        }

        // Show the view.
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
        // Verify that the user is authenticated.
        if ( ! Auth::check() ) {
            abort(401);
        }

        // Validate the form.
        $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        // Store the resource.
        $id = BlogPost::create([
            'author_id' => Auth::id(),
            'title'     => $request->input('title'),
            'body'      => $request->input('body')
        ])->id;

        // Redirect the view.
        return redirect('/blog/' . $id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(BlogPost $post)
    {
        // Show the view.
        return view('blog.viewSinglePost')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(BlogPost $post)
    {
        // Verify that the user is authenticated.
        if ( ! Auth::check() ) {
            abort(401);
        }

        // Show the view.
        return view('blog.editPost')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogPost $post, Request $request)
    {
        // Verify that the user is authenticated.
        if ( ! Auth::check() ) {
            abort(401);
        }

        // Validate the form.
        $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        // Update the resource.
        $post->update([
            'title'     => $request->input('title'),
            'body'      => $request->input('body')
        ]);

        // Show the view.
        return view('blog.viewSinglePost')->with('post', $post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogPost $post)
    {
        // Verify that the user is authenticated.
        if ( ! Auth::check() ) {
            abort(401);
        }

        // Delete the resource.
        $post->delete();

        // Redirect the view.
        return redirect('/blog');
    }

    /**
     * Display a listing of the resource matching arbitrary search query.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        // Retrieve the search query.
        $query = $request->input('query');

        // Search the database for matching posts.
        $posts = BlogPost::with(['author'])
            ->where('body', 'LIKE', "%{$query}%")
            ->orWhere('title', 'LIKE', "%{$query}%")
            ->paginate(10);
                
        // Show the view.
        return view('blog.viewMultiplePosts')->with('posts', $posts);
    }

    /**
     * Display a listing of the resource matching search query.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function viewPostsByAuthorId(User $user) {

        // Find the posts.
        $posts = BlogPost::where('author_id', $user->id)
            ->paginate(10);

        // Show the view.
        return view('blog.viewMultiplePosts')->with('posts', $posts);
    }
}
