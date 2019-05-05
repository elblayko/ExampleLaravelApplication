@extends('app')

@section('title', 'Create Post')

@section('content')

<div class="card">
  <h3 class="card-header">Create a post</h3>
  <div class="card-block  card-padded">
    <form method="post" action={{ action('BlogPostsController@store') }}>
      @csrf
      <div class="form-group">
        <label for="inputPostTitle">Title</label>
        <input name="postTitle" type="text" class="form-control" id="inputPostTitle" placeholder="Enter topic title...">
      </div>
      <div class="form-group">
        <label for="inputPostBody">Post Body</label>
        <textarea name="postBody" class="form-control" id="inputPostBody" rows="5"></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>


</div>
@endsection