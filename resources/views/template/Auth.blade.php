<!DOCTYPE html>
<html class="scroll-smooth">

<head>
    <title>{{ $title ?? "Hello"}}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://kit.fontawesome.com/4daff5ca84.js" crossorigin="anonymous"></script>
</head>

<body class="">
    <x-notify::notify />

    @yield('section-auth')


    @notifyJs
</body>

<script src="{{ asset('js/sweetAlert.js') }}"></script>
</html>

