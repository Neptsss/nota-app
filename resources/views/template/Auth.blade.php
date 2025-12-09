<!DOCTYPE html>
<html class="scroll-smooth">

<head>
    <title>{{ $title ?? "Hello"}}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://kit.fontawesome.com/4daff5ca84.js" crossorigin="anonymous"></script>
</head>

<body class="bg-[#F1F5F9]">

    @yield('section-auth')
    
</body>

<script src="{{ asset('js/sweetAlert.js') }}"></script>
</html>

