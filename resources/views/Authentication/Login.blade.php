@extends('template.auth')
@section('section-auth')
    <div class="flex h-screen justify-center items-center">
        <form class="border p-6 rounded-md" action="{{route('login.auth')}}" method="post">
            @csrf


            <p class="text-center text-xl font-bold  ">Sign In</p>
            <p class="my-5">Enter your credentials to acces your account</p>
            <div>
                <input type="text" class= "block border mb-4 rounded-md px-3 py-1 w-full" name="username" placeholder="Username">
                <input type="Password" class="block border mb-4 rounded-md px-3 py-1 w-full" name="password" placeholder="Password">
            </div>
            <button type="submit" class="block border mb-4 rounded-md px-3 py-1 w-full bg-[#A4133C] text-white">Sign In</button>







        </form>


    </div>
@endsection
