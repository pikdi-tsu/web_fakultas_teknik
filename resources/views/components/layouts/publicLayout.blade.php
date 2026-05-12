<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ $titleHead }} | Fakultas Teknik - Tiga Serangkai University</title>
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    </head>
    <body>
        <x-layouts.navbar/>

        <div style="min-height: 100vh" id="MainContent">
            
            <div class="container mt-5">
                <h4 class=" fw-bold">{{ $title }}</h4>
                {{ $mainContent }}
            </div>
        </div>
        
        <x-layouts.help/>
        <x-layouts.footer/>

        @livewireScripts
        <script src="{{ asset('js/session-handler.js') }}"></script>
    </body>
</html>