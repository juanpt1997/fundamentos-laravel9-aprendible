<x-layouts.app title="{{ $post->title }}" :meta-description="$post->body">
    <h1>
        {{ $post->title }}
    </h1>
    <p>{{ $post->body }}</p>
    {{-- <a href="/blog">Regresar</a> --}}
    <a href="{{ route('posts.index') }}">Regresar</a> {{-- ? Es mejor acceder a la ruta con nombre que a la url directamente --}}
</x-layouts.app>