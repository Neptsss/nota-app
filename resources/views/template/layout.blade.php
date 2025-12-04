<!DOCTYPE html>
<html class="scroll-smooth">

<head>
    <title>{{ $title ?? "Hello"}}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://kit.fontawesome.com/4daff5ca84.js" crossorigin="anonymous"></script>
</head>

<body class="bg-[#F1F5F9] relative">
    @include('template.sidebar')
    <div class="border-b border-gray-300 text-center p-4 shadow-md fixed top-0 left-0 right-0  bg-white">
        <p class="text-2xl font-bold text-[#0e53a7]">{{ $header }}</p>
    </div>
    <main class="ml-20 p-10 transition-all duration-300 pt-20">
        @yield("content")
    </main>
    <a href="#" class="opacity-30 hover:opacity-100 fixed bottom-10 right-10 px-2 py-1 border rounded-full hover:text-white hover:bg-[#A4133C] transition-all duration-300 ease-in-out hover:shadow-md hover:shadow-rose-500/60 hover:border-none">
        <i class="fa-solid fa-angle-up text-2xl"></i>
    </a>
</body>

<script src="{{ asset('js/sweetAlert.js') }}"></script>
</html>
