@extends('app')

@section('title', 'All Posts')

@section('content')

<div class="card">
  <h3 class="card-header">My Blog Posts<a class="btn btn-primary float-right" href="/blog/create">New Post</a>
  </h3>

  <div class="card-block p-3">
    @if ( count($posts) > 0 )
    @foreach ( $posts as $post )
    <div class="card ">
      <div class="card-header">
        Created at: {{ $post->created_at }}
      </div>
      <div class="card-body">
        <h5 class="card-title">{{$post->title}} </h5>
        <p class="card-text">{{ substr($post->body, 0, 300) }}</p>
        <a href="#" class="btn btn-primary">Read more...</a>
      </div>
    </div>
    @endforeach
    {{ $posts->links() }}
    @else
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">There are no posts.</h5>
      </div>
    </div>
    @endif
  </div>
</div>
@endsection