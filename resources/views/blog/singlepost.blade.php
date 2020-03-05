@extends('blog.layout')

@section('content')
    <h2>This is the post:</h2>
    <h4>{{ $post->title }}</h4>
    <article>{{ $post->body }}</article>
@endsection