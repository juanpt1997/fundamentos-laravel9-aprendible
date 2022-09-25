<nav>
    <ul>
        {{-- ? Es mejor usar las dobles llaves de blade que lo de abajo, --}}
        {{-- ? así evitamos inyección de código html, en especial scripts y otros problemas de seguridad --}}
        {{-- ? <?= route('home') ?> --}}
        {{-- ? En el caso de querer que se inyecte código html la sintaxis es la siguiente: --}}
        {{-- ? {!! <script></script> !!} --}}
        <li><a href="{{ route('home') }}">Home</a></li>
        {{-- <li><a href="{{ route('blog') }}">Blog</a></li> --}} {{-- ? Así se podía llamar pero es buena practica que indique la ruta --}}
        <li><a href="{{ route('posts.index') }}">Blog</a></li>
        <li><a href="{{ route('about') }}">About</a></li>
        <li><a href="{{ route('contact') }}">Contact</a></li>
    </ul>
</nav>
