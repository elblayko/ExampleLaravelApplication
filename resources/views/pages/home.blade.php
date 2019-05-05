@extends('app')

@section('title', 'Home')

@section('content')
<section class="jumbotron text-center">
  <div class="container">
    <h1 class="jumbotron-heading">Welcome!</h1>
    <p class="lead text-muted">This is the example Laravel application.</p>
  </div>
</section>
<div class="row">
  <aside class="col-md-4">
    <h1>Sidebar Content</h1>
    <p>This is the sidebar content.  You can feature anything that you would like, such as a link to a featured blog post, or another page on your website.</p>
    <a href="/blog" class="btn btn-primary">Read more...</a>
  </aside>
  <section class="col-md-8">
    <h1>Main Content</h1>
    <p>The the most prominent content can be viewed here.  It can consist of the most important or relevant information that you would like visitors to see.</p>
  </section>
</div>
@endsection