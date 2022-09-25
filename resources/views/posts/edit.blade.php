<x-layouts.app title="{{ $post->title }}" :meta-description="$post->body">
    <h1>
        Edit form
    </h1>

    <form action="{{ route('posts.update', $post) }}" method="post">
        @csrf @method('patch')
        <label for="">Title</label>
        <br>
        <input name="title" type="text" value="{{ old('title', $post->title) }}"> {{-- ? old('title', 'default') --}}
        <br>
        @error('title')
            <small tyle="color:red">{{ $message }}</small>
            <br>
        @enderror

        <br>
        <label for="">Body</label>
        <br>
        <textarea name="body">{{ old('body', $post->body) }}</textarea>
        @error('body')
            <br>
            <small tyle="color:red">{{ $message }}</small>
            <br>
        @enderror

        <br>
        <button type="submit">Enviar</button>
    </form>

    <br>
    <a href="{{ route('posts.index') }}">Regresar</a>
</x-layouts.app>
