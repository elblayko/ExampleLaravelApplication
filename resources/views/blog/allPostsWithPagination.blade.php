@extends('app')
@section('title', 'All Posts')

@section('content')
<div class="card clearfix">
  <div class="card-header">
    <h3 class="d-inline-block">
      @if ( $headerType == 'search' )
        {{ count($posts) }} post matching '{{ $query }}'      
      @elseif ( $headerType == 'viewAll')
        All Posts
      @endif
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
      <div class="card-body mt-2">
        <p class="card-text">{{ substr($post->body, 0, 300) }}</p>
        <hr />
        @if ( $post->created_at == $post->updated_at )
        Created at at {{ $post->created_at }}
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
@endsection