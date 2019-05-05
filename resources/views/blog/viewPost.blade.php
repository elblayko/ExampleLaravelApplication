@extends('app')

@section('title', 'View Post')

@section('content')


<div class="card">
    <div class="card">
        <div class="card-header align-bottom">
            <h3 class="d-inline-block">{{ $post->title }}</h3>
            <form method="POST" class="d-inline-block float-right" action="/blog/{{$post->id}}">
                @method('DELETE')
                @csrf
                <input type="submit" class="btn btn-danger float-right" value="Delete Post">
            </form>
            <a class="btn btn-primary d-inline-block float-right" href="/blog/{{$post->id}}/edit">Edit Post</a>
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