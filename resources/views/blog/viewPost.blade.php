@extends('app')

@section('title', 'View Post')

@section('content')
<div class="row">
    <div class="col-md-12 text-center">
        <h1>My Blog Posts</h1>
    </div>
</div>

<div class="row">
    Post ID: {{ $post->id }}<br />
    Author ID: {{ $post->author_id }}<br />
    Title: {{ $post->title }}
</div>
@endsection