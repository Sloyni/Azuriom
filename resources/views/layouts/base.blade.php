<!DOCTYPE html>
@include('elements.base')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('description', setting('description', ''))">
    <meta name="theme-color" content="#3490DC">
    <meta name="author" content="Azuriom">

    <meta property="og:title" content="@yield('title')">
    <meta property="og:type" content="@yield('type', 'website')">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ favicon() }}">
    <meta property="og:description" content="@yield('description', setting('description', ''))">
    <meta property="og:site_name" content="{{ site_name() }}">
    @stack('meta')

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | {{ site_name() }}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ favicon() }}">

    <!-- Scripts -->
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}" defer></script>
    <script src="{{ asset('vendor/axios/axios.min.js') }}" defer></script>
    <script src="{{ asset('js/script.js') }}" defer></script>

    <!-- Page level scripts -->
    @stack('scripts')

    <!-- Fonts -->
    <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    @stack('styles')
    <style>
        html,
        body {
            height: 100%;
        }

        a {
            text-decoration: none;
        }

        img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>

<body class="d-flex flex-column bg-body-secondary" @if(dark_theme()) data-bs-theme="dark" @endif>
    <div id="app" class="flex-shrink-0">
        <header>
            @include('elements.navbar')
        </header>

        @yield('app')
    </div>

    <footer class="bg-black text-white py-4 mt-auto">
        <div class="container text-center">
            <p class="mb-0">{{ setting('copyright') }} | @lang('messages.copyright')</p>
            <div class="d-flex justify-content-center gap-2 flex-wrap">
                @foreach(social_links() as $link)
                    <a href="{{ $link->value }}" title="{{ $link->title }}" target="_blank" rel="noopener noreferrer"
                    data-bs-toggle="tooltip"
                    class="d-flex align-items-center justify-content-center rounded-circle mt-3"
                    style="width: 40px; height: 40px; background: {{ $link->color }};">
                        <i class="{{ $link->icon }} text-white"></i>
                    </a>
                @endforeach
            </div>
        </div>
    </footer>

    @stack('footer-scripts')
</body>
</html>
