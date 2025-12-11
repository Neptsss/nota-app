@extends('template.auth')
@section('section-auth')
<div class="flex flex-col h-screen justify-center items-center">
    <form class="shadow-xl flex items-center p-6 rounded-md w-[50%]  bg-white" action="{{route('login.auth')}}" method="post" >
        <div class="w-[70%] mx-auto ">
            <p class="text-primary font-bold text-xl mb-5 text-center">PT WULUNG ARTHA MILIA</p>
            <div>
                <img src="{{ asset('img/login_nota.png') }}" alt="" class=" w-56 mx-auto">
            </div>
            <div>
                <div class="border border-gray-300 mb-4 rounded-md px-3 py-2">
                    <input type="text" class="block rounded-md w-full focus:outline-none "
                        name="username" placeholder="Username">
                </div>
                    <div class="flex items-center border border-gray-300 mb-4 rounded-md px-3 py-2">
                        <input type="Password"
                            class="block not-only-of-type:rounded-md  w-full focus:outline-none "
                            name="password" placeholder="Password" id="password">
                            <i class="fa-regular fa-eye-slash text-xl cursor-pointer" id="show_password" onclick="showPassword(this)"></i>
                    </div>
            </div>
            <button type="submit"
                class="block mb-4 rounded-md px-6 py-3 w-full bg-primary text-white cursor-pointer hover:scale-105 hover:shadow-md hover:shadow-rose-700/60 duration-300 ease-in-out hover:font-bold">
                Sign In
            </button>
        </div>
        @csrf
    </form>
    <div class="text-center mt-10 text-gray-400 font-semibold">
        <p>Jl. Basuki Rahmad No. 1 Ngawi</p>
        <p>Telp: (0351) 123456 | Email: info@wulungartha.co.id</p>
    </div>

</div>

<script>
    function showPassword(e){
            if(e.classList.contains('fa-eye-slash')){
                e.classList.remove('fa-eye-slash')
                e.classList.add('fa-eye')
                document.getElementById('password').type = 'text'
            }else{
                e.classList.remove('fa-eye')
                e.classList.add('fa-eye-slash')
                document.getElementById('password').type = 'password'
            }

    }
</script>
@endsection
