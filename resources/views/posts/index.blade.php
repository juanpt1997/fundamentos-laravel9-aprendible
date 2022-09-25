<x-layouts.app title="Blog" meta-description="Blog meta description">

    {{-- ? Lo dejo dentro de una condición para que no quede siempre el div en el html --}}
    {{-- ? Además, quiero que el mensaje de status quede en todas las vistas, por esto mejor lo incluyo en el layout --}}
    {{-- @if (session('status'))
        <div class="status">
            {{ session('status') }}
        </div>
    @endif --}}

    <h1>Blog</h1>
    <a href="{{ route('posts.create') }}">Create new post</a>
    {{-- @dump($posts) --}}
    @foreach ($posts as $post)
    <div style="display:flex;align-items:baseline">
        {{-- <h2>{{ $post['title'] }}</h2> --}} {{-- Resulta que esto dejó de ser un arreglo para volverse un objeto por lo que se llamo de la base de datos --}}
        {{-- <h2><a href="/blog/{{ $post->id }}">{{ $post->title }}</a></h2> --}} {{-- ? Es mejor usar la ruta con nombre --}}
        <h2><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></h2>
        &nbsp;
        <a href="{{ route('posts.edit', $post) }}">Edit</a>
    </div>
    @endforeach
</x-layouts.app>

{{-- @extends('layouts.app')

@section('title', 'Blog')

@section('content')
    <h1>Blog</h1>
@endsection --}}