<aside
    class="group bg-[#1E293B] fixed top-0 left-0 h-full w-20 hover:w-64 transition-all duration-300 ease-in-out shadow-lg overflow-hidden z-50  ">
    <div class="mb-10">
        <div class="flex justify-center items-center my-5">
            <p>Logo</p>
        </div>
        <div class="h-px bg-gray-600 w-10 mx-auto group-hover:w-5/6 transition-all duration-300 mt-4"></div>
    </div>
    <div class="p-3">
        <ul class="flex flex-col gap-2">
            <li>
                <a href="#"
                    class="relative flex items-center h-12 px-3 rounded-md hover:bg-[#334155] text-gray-300 hover:text-[#60A5FA] transition-all duration-200">
                    <div class="w-8 flex justify-center items-center">
                        <i class="fas fa-receipt text-lg"></i>
                    </div>

                    <span
                        class="ml-3 font-medium whitespace-nowrap w-0 overflow-hidden group-hover:w-auto opacity-0 group-hover:opacity-100 transition-all duration-300 delay-75">
                        Transaksi
                    </span>

                    <span
                        class="absolute left-14 bg-gray-900 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:hidden pointer-events-none transition-opacity duration-300 z-50">
                        Transaksi
                    </span>
                </a>
            </li>
            <li>
                <a href="{{ route('nasabah.index') }}"
                    class="relative flex items-center h-12 px-3 rounded-md hover:bg-[#334155] text-gray-300 hover:text-[#60A5FA] transition-all duration-200">
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
    </div>
</aside>
