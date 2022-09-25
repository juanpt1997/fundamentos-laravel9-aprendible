<x-layouts.app title="Crear nuevo post" meta-description="Formulario para crear un nuevo blog post">
    <h1>Create new post</h1>

    {{-- @dump($errors->all()) --}}
    {{-- @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
    @endforeach --}}
    {{-- ? También podemos incluir esto debajo de cada input --}}
    <form action="{{ route('posts.store') }}" method="post">
        @csrf {{-- ? Laravel nos protege de estos ataques, para permitir el formulario debemos agregar esto --}}
        {{-- <input type="hidden" name="_token" value="ODRfDhIpEcP6HP4ErlourIxxlrAxRWwjmMrai9Sf"> --}} {{-- ? Ese csrf imprime algo así con el valor del token, esto es lo que le da seguridad --}}
        <label for="">Title</label>
        <br>
        <input name="title" type="text" value="{{ old('title') }}">
        <br>
        @error('title')
            <small tyle="color:red">{{ $message }}</small>
            <br>
        @enderror
        
        <br>
        <label for="">Body</label>
        <br>
        <textarea name="body">{{ old('body') }}</textarea>
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
