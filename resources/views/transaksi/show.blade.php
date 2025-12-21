@extends('template.Layout')
@section('content')
<a href="{{ route('transaksi.index')}}" class="block w-36 max-w-[20%] text-center px-4 py-2 border-primary border my-5 rounded-md transition-all
duration-300 hover:shadow-md shadow-primary/60 hover:bg-primary hover:text-white hover:-translate-y-1 hover:font-bold">
    <i class="fa-regular fa-circle-left"></i>
    <span>Kembali</span>
</a>
<div class="bg-white my-5 rounded-md p-6 shadow-md">
    <p class="mb-4 text-2xl text-primary font-semibold text-shadow-sm">Detail Transaksi</p>
    <table class="table-auto w-full">
        <thead>
            <tr>
                <th class="border border-slate-200 px-4 py-2 bg-primary text-white">Tanggal Transaksi</th>
                <th class="border border-slate-200 px-4 py-2 bg-primary text-white">Jenis Transaksi</th>
                <th class="border border-slate-200 px-4 py-2 bg-primary text-white">Nama Nasabah</th>
                <th class="border border-slate-200 px-4 py-2 bg-primary text-white">Jenis ID</th>
                <th class="border border-slate-200 px-4 py-2 bg-primary text-white">Mata Uang</th>
                <th class="border border-slate-200 px-4 py-2 bg-primary text-white">Jumlah Uang </th>
                <th class="border border-slate-200 px-4 py-2 bg-primary text-white">Rate</th>
                <th class="border border-slate-200 px-4 py-2 bg-primary text-white">Total (RP)</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td class="border border-slate-200 px-4 py-2 ">
                    {{\Carbon\Carbon::parse($transaksi->tgl_transaksi)->locale('id')->translatedFormat('d F Y')}}</td>
                <td class="border border-slate-200 px-4 py-2 ">{{$transaksi->jenis_transaksi}}</td>
                <td class="border border-slate-200 px-4 py-2 ">{{$transaksi->nasabah->nama_nasabah}}</td>
                <td class="border border-slate-200 px-4 py-2 ">{{$transaksi->nasabah->jenis_id}}</td>
                <td class="border border-slate-200 px-4 py-2 ">{{$transaksi->detail_transaksi->mata_uang}}</td>
                <td class="border border-slate-200 px-4 py-2 ">{{$transaksi->detail_transaksi->jumlah}}</td>
                <td class="border border-slate-200 px-4 py-2 ">{{number_format($transaksi->detail_transaksi->rate, 2,
                    ',', '.')}}</td>
                <td class="border border-slate-200 px-4 py-2 ">{{number_format($transaksi->detail_transaksi->sub_total,
                    2, ',', '.')}}</td>
            </tr>
        </tbody>
    </table>
</div>

<div class="bg-white my-5 rounded-md p-6 shadow-md">
    <p class="mb-4 text-2xl text-primary font-semibold text-shadow-sm">Nasabah</p>
    <table class="table-auto w-full">
        <thead>
            <tr>
                <th class="border border-slate-200 px-4 py-2 bg-primary text-white">Nama</th>
                <th class="border border-slate-200 px-4 py-2 bg-primary text-white">No HP</th>
                <th class="border border-slate-200 px-4 py-2 bg-primary text-white">Jenis ID</th>
                <th class="border border-slate-200 px-4 py-2 bg-primary text-white">No ID</th>
                <th class="border border-slate-200 px-4 py-2 bg-primary text-white">Foto ID</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td class="border border-slate-200 px-4 py-2">{{$nasabah->nama_nasabah}}</td>
                <td class="border border-slate-200 px-4 py-2">{{$nasabah->no_hp}}</td>
                <td class="border border-slate-200 px-4 py-2">{{$nasabah->jenis_id}}</td>
                <td class="border border-slate-200 px-4 py-2">{{$nasabah->no_id}}</td>
                <td class="border border-slate-200 px-4 py-2">
                    <div class="relative group cursor-pointer w-32  mx-auto"
                        onclick="toggleModal(true , '{{ asset('img/foto_id/'.$nasabah->foto_id) }}')"">
                        <img src=" {{ asset('img/foto_id/'.$nasabah->foto_id) }}" alt="{{ "Foto ID
                        ".$nasabah->nama_nasabah
                        }}" class=" rounded-md group-hover:brightness-50 foto">
                        <i
                            class="fa-solid fa-eye absolute text-white top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 group-hover:opacity-100 opacity-0"></i>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>

    <div id="imageModal"
        class="fixed inset-0 bg-black/60 backdrop-blur-sm z-50 hidden flex justify-center items-center transition-opacity duration-300">

        <div class="bg-white p-6 rounded-lg shadow-2xl max-w-lg w-full mx-4 transform transition-all scale-95 opacity-0"
            id="modalContent" onclick="event.stopPropagation()">

            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-bold text-gray-800">Foto ID</h3>
                <button onclick="toggleModal(false)" class="text-gray-500 hover:text-red-500 transition-colors">
                    <i class="fa-solid fa-xmark text-2xl"></i>
                </button>
            </div>

            <div class="w-full h-64 bg-gray-200 rounded overflow-hidden">
                <img src="" class="w-full h-full object-contain" alt="Detail Foto" id="modalImage">
            </div>

            <div class="mt-4 text-right">
                <button onclick="toggleModal(false)"
                    class="px-4 py-2 bg-gray-800 text-white rounded hover:bg-gray-700 transition">
                    Tutup
                </button>
            </div>
        </div>

        <div class="absolute inset-0 -z-10" onclick="toggleModal(false)"></div>
    </div>

    <script>
        function toggleModal(show,imageUrl = null){
        const modal = document.getElementById('imageModal')
        const modalContent = document.getElementById('modalContent')
        const modalImage = document.getElementById('modalImage');
        const body = document.body
        if(show){
        
        if (imageUrl) {
        modalImage.src = imageUrl;
        }
        modal.classList.remove('hidden')
        body.classList.add('overflow-hidden')
        
        setTimeout(() => {
        modalContent.classList.remove('scale-95', 'opacity-0');
        modalContent.classList.add('scale-100', 'opacity-100');
        
        }, 10);
        
        }else{
        modalContent.classList.remove('scale-100', 'opacity-100');
        modalContent.classList.add('scale-95', 'opacity-0');
        
        setTimeout(() => {
        modal.classList.add('hidden')
        body.classList.remove('overflow-hidden');
        if(modalImage) modalImage.src = '';
        }, 300);
        }
        }
    </script>
    @endsection