@extends('app')

@section('title', 'Edit Post')

@section('content')
<div class="card">
    <h3 class="card-header">Create a post</h3>
    <div class="card-block  card-padded">
      <form method="POST" action="/blog/{{$post->id}}" }}>
        @method('PUT')
        @csrf
        <div class="form-group">
          <label for="inputPostTitle">Title</label>
          <input name="title" type="text" class="form-control" id="inputPostTitle" placeholder="Enter topic title..." value="{{$post->title}}">
        </div>
        <div class="form-group">
          <label for="inputPostBody">Post Body</label>
          <textarea name="body" class="form-control" id="inputPostBody" rows="5">{{$post->body}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
@endsection