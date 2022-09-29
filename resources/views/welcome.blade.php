{{-- @component('components.layout') --}}
{{-- ? todo el html que está dentro de estas etiquetas llega al layout como un slot, lo que esté como slot llega como propiedades --}}
<x-layouts.app title="Home" meta-description="Home meta description">
    {{-- <x-slot name="title">
        Home
    </x-slot> --}}
    <h1 class="my-4 font-serif text-3xl text-center text-sky-600 dark:text-sky-500">Home</h1>
</x-layouts.app>
{{-- @endcomponent --}}
