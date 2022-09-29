<x-layouts.app title="Blog" meta-description="Blog meta description">

    {{-- ? Lo dejo dentro de una condición para que no quede siempre el div en el html --}}
    {{-- ? Además, quiero que el mensaje de status quede en todas las vistas, por esto mejor lo incluyo en el layout --}}
    {{-- @if (session('status'))
        <div class="status">
            {{ session('status') }}
        </div>
    @endif --}}

    <header class="px-6 py-4 space-y-2 text-center">
        <h1 class="font-serif text-3xl text-sky-600 dark:text-sky-500">Blog</h1>

        <a class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-center text-white uppercase transition duration-150 ease-in-out border border-transparent rounded-md dark:text-sky-200 bg-sky-800 hover:bg-sky-700 active:bg-sky-900 focus:outline-none focus:border-sky-900 focus:shadow-outline-sky"
            href="{{ route('posts.create') }}">Create new post</a>
    </header>
    {{-- @dump($posts) --}}
    <main class="grid w-full gap-4 px-4 max-w-7xl sm:grid-cols-2 md:grid-cols-3">
        @foreach ($posts as $post)
            <div class="max-w-3xl px-4 py-2 space-y-4 bg-white rounded shadow dark:bg-slate-800">
                {{-- <h2>{{ $post['title'] }}</h2> --}} {{-- Resulta que esto dejó de ser un arreglo para volverse un objeto por lo que se llamo de la base de datos --}}
                {{-- <h2><a href="/blog/{{ $post->id }}">{{ $post->title }}</a></h2> --}} {{-- ? Es mejor usar la ruta con nombre --}}
                <h2 class="text-xl text-slate-600 dark:text-slate-300 hover:underline">
                    <a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a>
                </h2>
                <div class="flex justify-between">
                    <a class="inline-flex items-center text-xs font-semibold tracking-widest text-center uppercase transition duration-150 ease-in-out dark:text-slate-400 text-slate-500 hover:text-slate-600 dark:hover:text-slate-500 focus:outline-none focus:border-slate-200" href="{{ route('posts.edit', $post) }}">Edit</a>
                    {{-- ? Esto no sirve porque me manda por get, necesito crear un formulario para eso --}}
                    {{-- <a href="{{ route('posts.destroy', $post) }}">Delete</a> --}}
                    <form action="{{ route('posts.destroy', $post) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="inline-flex items-center text-xs font-semibold tracking-widest text-center text-red-500 uppercase transition duration-150 ease-in-out dark:text-red-500/80 hover:text-red-600 focus:outline-none" type="submit">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    </main>
</x-layouts.app>

{{-- @extends('layouts.app')

@section('title', 'Blog')

@section('content')
    <h1>Blog</h1>
@endsection --}}
