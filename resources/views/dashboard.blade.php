@extends('template.layout')
@section('content')
<div class=" grid grid-cols-2 gap-5 mt-10">
    {{-- transaksi --}}
    <div class="bg-white shadow-lg rounded-md p-5">
        <div class="flex items-center gap-4">
            <div>
                <p class="text-lg font-bold">Jumlah Transaksi</p>
            </div>
            <a href="{{ route('transaksi.index') }}" class="bg-blue-600 w-7 hover:w-[30%] flex items-center gap-4 p-1.5 rounded-md shadow-md shadow-blue-400/70 group duration-500 ease-in-out ">
                <i class="fa-solid fa-circle-info block text-white"></i>
                <p class="opacity-0 group-hover:opacity-100 transition-all duration-500 ease-in-out text-white">Selengkapnya</p>
            </a>
        </div>
        <div class="flex items-center gap-5 mt-5">
            <div class="bg-rose-100 rounded-md p-5">
                <i class="fas fa-receipt text-2xl text-primary"></i>
            </div>
            <div>
                <p class="text-xl font-bold">120</p>
            </div>
        </div>
    </div>

    {{-- nasabah --}}
    <div class="bg-white shadow-lg rounded-md p-5">
        <div class="flex items-center gap-4">
            <div>
                <p class="text-lg font-bold">Jumlah Nasabah</p>
            </div>
            <a href="{{ route('nasabah.index') }}"
                class="bg-blue-600 w-7 hover:w-[30%] flex items-center gap-4 p-1.5 rounded-md shadow-md shadow-blue-400/70 group duration-500 ease-in-out ">
                <i class="fa-solid fa-circle-info block text-white"></i>
                <p class="opacity-0 group-hover:opacity-100 transition-all duration-500 ease-in-out text-white">Selengkapnya
                </p>
            </a>
        </div>
        <div class="flex items-center gap-5 mt-5">
            <div class="bg-orange-100 rounded-md p-5">
                <i class="fas fa-user text-2xl text-orange-600"></i>
            </div>
            <div>
                <p class="text-xl font-bold">120</p>
            </div>
        </div>
    </div>

    {{-- mata uang --}}
    <div class="bg-white shadow-lg rounded-md p-5">
                <p class="text-lg font-bold">Jumlah Mata Uang</p>
           
        <div class="flex items-center gap-5 mt-5">
            <div class="bg-cyan-100 rounded-md p-5">
                <i class="fa-solid fa-dollar-sign text-2xl text-cyan-600"></i>
            </div>
            <div>
                <p class="text-xl font-bold">120</p>
            </div>
        </div>
    </div>

    {{-- total transaksi --}}
    <div class="bg-white shadow-lg rounded-md p-5">
        <p class="text-lg font-bold">Total Seluruh Transaksi</p>
    
        <div class="flex items-center gap-5 mt-5">
            <div class="bg-emerald-100 rounded-md p-5">
                <i class="fa-solid fa-sack-dollar text-2xl text-emerald-600"></i>
            </div>
            <div>
                <p class="text-xl font-bold">Rp 120.000.000</p>
            </div>
        </div>
    </div>
</div>
@endsection