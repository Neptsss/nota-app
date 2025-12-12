<aside
    class="group bg-[#A4133C] fixed top-0 left-0 h-full w-20 hover:w-64 transition-all duration-300 ease-in-out shadow-lg overflow-hidden z-50 flex flex-col">

    <div class="mb-10">
        <div class="flex justify-center items-center my-5">
            <p>Logo</p>
        </div>
        <div class="h-px bg-[#f2e9e4] w-10 mx-auto group-hover:w-5/6 transition-all duration-300 mt-4"></div>
    </div>

    <div class="p-3 flex flex-col flex-1">

        <ul class="flex flex-col gap-2">
            <li>
                <a href="{{ route('transaksi.index') }}"
                    class="relative flex items-center h-12 px-3 rounded-md hover:bg-white text-gray-300 hover:text-[#A4133C] transition-all duration-200">
                    <div class="w-8 flex justify-center items-center">
                        <i class="fas fa-receipt text-lg"></i>
                    </div>
                    <span
                        class="ml-3 font-medium whitespace-nowrap w-0 overflow-hidden group-hover:w-auto opacity-100 group-hover:opacity-100 transition-all duration-300 delay-75">
                        Transaksi
                    </span>
                </a>
            </li>
            <li>
                <a href="{{ route('nasabah.index') }}"
                    class="relative flex items-center h-12 px-3 rounded-md  hover:bg-white text-gray-300 hover:text-[#A4133C] transition-all duration-200">
                    <div class="w-8 flex justify-center items-center">
                        <i class="fas fa-user text-lg"></i>
                    </div>
                    <span
                        class="ml-3 font-medium whitespace-nowrap w-0 overflow-hidden group-hover:w-auto opacity-0 group-hover:opacity-100 transition-all duration-300 delay-75">
                        Nasabah
                    </span>
                </a>
            </li>
        </ul>

        <div class="mt-auto">
            <form action="{{route('logout')}}" method="post"
                class="relative flex items-center h-12 px-3 rounded-md  hover:bg-white text-gray-300 hover:text-[#A4133C] transition-all duration-200 gap-5 ">
                @csrf
                <div class="w-8 flex justify-center items-center">
                   <i class="fa-solid fa-arrow-right-from-bracket text-lg"></i>
                </div>
                <button type="submit"
                    class="ml-3 cursor-pointer font-medium whitespace-nowrap w-0 overflow-hidden group-hover:w-auto opacity-0 group-hover:opacity-100 transition-all duration-300 delay-75">
                    Logout
                </button>
            </form>
        </div>

    </div>
</aside>

