@extends('app')

@section('title', 'View Post')

@section('content')


<div class="card">
    <div class="card">
        <div class="card-header align-bottom">
            <h3 class="d-inline-block">{{ $post->title }}</h3>
            <a class="btn btn-danger float-right" href="/blog/create">Delete Post</a>
            <a class="btn btn-primary float-right" href="/blog/1/edit">Edit Post</a>
        </div>
        <div class="card-body mt-2">
            <p class="card-text">{{ $post->body }}</p>
            <hr />
            Created at at {{ $post->created_at }}
            @if ( $post->created_at != $post->updated_at )
            last updated: {{ $post->updated_at }}
            @endif
        </div>
    </div>
</div>
@endsection