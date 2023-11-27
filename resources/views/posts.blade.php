@extends('layouts/main')

@section('container')
  @foreach($posts as $post)
    <article class="mb-5 border-bottom">
        <h2><a href="/post/{{ $post->slug }}" class="text-decoration-none">{{ $post->title }}</a></h2>
        <h5>by <a href="#" class="text-decoration-none">{{ $post->user->name }}</a> in <a href="/category/{{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a></h5>
        <p>{{ $post->excerpt }}</p>
        <p><a href="/post/{{ $post->slug }}" class="text-decoration-none">read more..</a></p>
    </article>
  @endforeach
@endsection('container')
