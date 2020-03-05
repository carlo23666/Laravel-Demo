@extends('blog.layout')
<!-- Uso de condicionales en Blade -->

@section('content')
@if (count($posts) > 0 )
    <h2>Listado de posts:</h2>
    <ul>
        @foreach($posts as $post)
            <li>
                <a href="{{ url('post', ['id' => $post->id]) }}">{{ $post->title }}</a>
            </li>
        @endforeach
    </ul>
@else
    <h3>No hay posts</h3>
@endif
@endsection

@section('footer')
<p>This is the footer</p>
@endsection