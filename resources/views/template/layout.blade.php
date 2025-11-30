<!DOCTYPE html>
<html>

<head>
    <title>{{ $title ?? "Hello"}}</title>
    @vite('resources/css/app.css')
    <script src="https://kit.fontawesome.com/4daff5ca84.js" crossorigin="anonymous"></script>
</head>

<body class="bg-[#F1F5F9]">
    @include('template.sidebar')
    <div class="border-b border-gray-300 text-center p-4 shadow-md">
        <p class="text-2xl font-bold text-[#0e53a7]">{{ $header }}</p>
    </div>
    <main class="ml-20 p-10 transition-all duration-300">

        @yield("content")
    </main>

</body>

</html>
