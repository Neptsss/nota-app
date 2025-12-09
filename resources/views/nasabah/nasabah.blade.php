@extends('template.layout')
@section('content')
<div class="mt-20">
    <form action="" id="searchForm">
        <div class="border rounded-xl w-1/4 flex justify-between items-center px-2 ">
            <i class="fa-solid fa-magnifying-glass block"></i>
            <input type="text" class="w-full px-2 py-1  focus:outline-none rounded-md block" placeholder="Cari Nasabah" autofocus>
        </div>
    </form>
</div>
<table class="table-auto mt-3 border-collapse border border-gray-400">
    <thead class="bg-gray-300   font-bold">
        <tr>
            <th class=" border border-gray-400 p-4">No</th>
            <th class=" border border-gray-400 p-4">Nama</th>
            <th class=" border border-gray-400 p-4">No HP</th>
            <th class=" border border-gray-400 p-4">Jenis ID</th>
            <th class=" border border-gray-400 p-4">No ID</th>
            <th class=" border border-gray-400 p-4"> Foto KTP</th>
            <th class=" border border-gray-400 p-4"> Action</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td class=" border border-gray-400 p-4">123</td>
            <td class=" border border-gray-400 p-4">15</td>
            <td class=" border border-gray-400 p-4">Beli</td>
            <td class=" border border-gray-400 p-4">Noval</td>
            <td class=" border border-gray-400 p-4">KTP</td>
            <td class=" border border-gray-400 p-4">
                <div class="relative group cursor-pointer w-16 h-16 mx-auto" onclick="toggleModal(true)"">
                     <img src=" https://picsum.photos/200" alt="" class=" rounded-md group-hover:brightness-50">
                    <i
                        class="fa-solid fa-eye absolute text-white top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 group-hover:opacity-100 opacity-0"></i>
                </div>

            </td>
            <td class=" border border-gray-400 p-4">
                <a href="{{ route('transaksi.show') }}"
                    class="text-center my-5 rounded-md px-2 py-1 block bg-sky-500 text-white hover:scale-110 hover:shadow-md hover:shadow-sky-500/60 transition-all duration-300"><i
                        class="fa-solid fa-eye"></i></a>

            </td>
        </tr>
    </tbody>
</table>
</div>

<div id="imageModal" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-50 hidden flex justify-center items-center transition-opacity duration-300">

    <div class="bg-white p-6 rounded-lg shadow-2xl max-w-lg w-full mx-4 transform transition-all scale-95 opacity-0"
        id="modalContent" onclick="event.stopPropagation()">

        <div class="flex justify-between items-center mb-4">
            <h3 class="text-xl font-bold text-gray-800">Foto ID</h3>
            <button onclick="toggleModal(false)" class="text-gray-500 hover:text-red-500 transition-colors">
                <i class="fa-solid fa-xmark text-2xl"></i>
            </button>
        </div>

        <div class="w-full h-64 bg-gray-200 rounded overflow-hidden">
            <img src="https://picsum.photos/id/15/800/600" class="w-full h-full object-cover" alt="Detail Foto">
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
    function toggleModal(show){
    const modal = document.getElementById('imageModal')
    const modalContent = document.getElementById('modalContent')
    const body = document.body

    if(show){
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
            body.classList.remove('overflow-hidden')
        }, 300);
    }
 }
</script>
@endsection
