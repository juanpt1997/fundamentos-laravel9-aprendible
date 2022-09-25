<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel9 - {{ $title ?? '' }}</title>
    <meta name="description" content="{{ $metaDescription ?? 'Default meta description' }}">
</head>
<body>
    <x-layouts.nav></x-layouts.nav>

    @if (session('status'))
        <div>{{ session('status') }}</div>
    @endif

    {{ $slot }} {{-- ? Palabra reservada de blade, slot principal para el contenido principal --}}
</body>
</html>