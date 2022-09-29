<x-layouts.app title="Crear nuevo post" meta-description="Formulario para crear un nuevo blog post">
    <h1 class="my-4 font-serif text-3xl text-center text-sky-600 dark:text-sky-500">Create new post</h1>

    {{-- @dump($errors->all()) --}}
    {{-- @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
    @endforeach --}}

    {{-- ? También podemos incluir esto debajo de cada input --}}
    <form class="max-w-xl px-8 py-4 mx-auto bg-white rounded shadow dark:bg-slate-800" action="{{ route('posts.store') }}" method="post">
        @csrf {{-- ? Laravel nos protege de estos ataques, para permitir el formulario debemos agregar esto --}}
        {{-- <input type="hidden" name="_token" value="ODRfDhIpEcP6HP4ErlourIxxlrAxRWwjmMrai9Sf"> --}} {{-- ? Ese csrf imprime algo así con el valor del token, esto es lo que le da seguridad --}}
        @include('posts.form-fields')
        <div class="flex items-center justify-between mt-4">
            <a class="text-sm font-semibold underline border-2 border-transparent rounded dark:text-slate-300 text-slate-600 focus:border-slate-500 focus:outline-none" href="{{ route('posts.index') }}">Regresar</a>

            <button class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-center text-white uppercase transition duration-150 ease-in-out border-2 border-transparent rounded-md dark:text-sky-200 bg-sky-800 hover:bg-sky-700 active:bg-sky-700 focus:outline-none focus:border-sky-500" type="submit">Enviar</button>
        </div>
    </form>
</x-layouts.app>
