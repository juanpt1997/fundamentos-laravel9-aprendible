<x-layouts.app title="{{ $post->title }}" :meta-description="$post->body">
    <h1>
        Edit form
    </h1>

    <form action="{{ route('posts.update', $post) }}" method="post">
        @csrf @method('patch')
        @include('posts.form-fields')
        <br>
        <button type="submit">Enviar</button>
    </form>

    <br>
    <a href="{{ route('posts.index') }}">Regresar</a>
</x-layouts.app>
