@extends('app')

@section('title', 'All Posts')

@section('content')

<div class="card clearfix">
  <div class="card-header">
      <h3 class="d-inline-block">My Blog Posts</h3>
      <a class="btn btn-primary float-right" href="/blog/create">New Post</a>
  </div>

  <div class="card-block m-3">
    @if ( count($posts) > 0 )
    @foreach ( $posts as $post )
    <div class="card">
      <div class="card-header">
        Created at {{ $post->created_at }}
      </div>
      <div class="card-body mt-2">
        <h5 class="card-title">{{$post->title}} </h5>
        <p class="card-text">{{ substr($post->body, 0, 300) }}</p>
      <a href="/blog/{{$post->id}}" class="btn btn-primary">Read more...</a>
      </div>
    </div>
    @endforeach
    {{ $posts->links() }}
    @else
    <div class="card">
      <div class="card-body mt-2">
        <h5 class="card-title">There are no posts.</h5>
      </div>
    </div>
    @endif
  </div>
</div>
@endsection