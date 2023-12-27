<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @vite('resources/css/app.css')
        <script src="https://unpkg.com/alpinejs@3"></script>
        @livewireStyles
        <title>{{ $title ?? 'Task Management-Eziline' }}</title>
    </head>
    <body>
        This is the LIvewire Layout
        {{ $slot }}
        @livewire('livewire-ui-modal')
        @livewireScripts
    </body>
</html>
