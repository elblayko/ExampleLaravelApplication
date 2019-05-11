@extends('app')

@section('title', 'All Posts')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h3 class="d-inline-block m-0">
            All Posts
          </h3>
          <a class="btn btn-primary float-right" href="/blog/create">New Post</a>
        </div>

        @if ( count($posts) > 0 )
        @foreach ( $posts as $post )
        <div class="card-block">
          <div class="card m-3">
            <div class="card-header">
              <h5 class="card-title m-0"><a href="/blog/{{$post->id}}">{{$post->title}}</a></h5>
            </div>
            <div class="card-body">
              <p class="card-text">{{ substr($post->body, 0, 300) }}</p>
              <hr />
              <a href="/blog/author/{{$post->author_id}}/posts">
                Author: {{ $post->author['name'] }}
              </a>
              @if ( $post->created_at == $post->updated_at )
              Created at: {{ $post->created_at }}
              @else
              Last updated: {{ $post->updated_at }}
              @endif
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
        </div>
        @endif
      </div>
    </div>
  </div>
</div>
@endsection