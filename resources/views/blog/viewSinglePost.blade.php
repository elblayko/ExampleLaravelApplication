@extends('app')

@section('title', 'View Post')

@section('content')
<div class="container">
    <div class="row mb-3">
        <div class="col-md-12">
            <a href="/blog" class="btn btn-primary btn-inline" role="button">Back</a>
            <div class="btn-group float-right m-auto" aria-label="Action buttons">
                <a class="btn btn-primary" href="/blog/{{$post->id}}/edit">Edit Post</a>
                <form method="POST" action="/blog/{{$post->id}}">
                    @method('DELETE')
                    @csrf
                    <input type="submit" role="button" class="btn btn-danger" value="Delete Post">
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="m-0">{{ $post->title }}</h3>
                </div>
                <div class="card-body">
                    <p class="card-text">{{ $post->body }}</p>
                    <hr />
                    Created at at {{ $post->created_at }}
                    @if ( $post->created_at != $post->updated_at )
                    last updated: {{ $post->updated_at }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection