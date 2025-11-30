@extends('template.layout')
@section('content')
<table class="border-collapse border border-gray-400 w-full">
    <thead>
        <th class="border border-gray-300 p-3 bg-[#1E293B] text-[#60A5FA]">Nama</th>
        <th class="border border-gray-300 p-3 bg-[#1E293B] text-[#60A5FA]">Jenis Id</th>
        <th class="border border-gray-300 p-3 bg-[#1E293B] text-[#60A5FA]">No ID</th>
        <th class="border border-gray-300 p-3 bg-[#1E293B] text-[#60A5FA]">No HP</th>
        <th class="border border-gray-300 p-3 bg-[#1E293B] text-[#60A5FA]">Foto ID</th>
        <th class="border border-gray-300 p-3 bg-[#1E293B] text-[#60A5FA]">Action</th>
    </thead>
    <tbody>
        @foreach ($nasabah as $item)
        <tr>
            <td class="border border-gray-300 p-3">{{ $item->nama_nasabah }}</td>
            <td class="border border-gray-300 p-3">{{ $item->jenis_id }}</td>
            <td class="border border-gray-300 p-3">{{ $item->no_id }}</td>
            <td class="border border-gray-300 p-3">{{ $item->no_hp }}</td>
            <td class="border border-gray-300 p-3">
                <div class="relative group cursor-pointer w-16 h-16 mx-auto" onclick="toggleModal(true)"">
                    <img src=" https://picsum.photos/200" alt="" class=" rounded-md group-hover:brightness-50">
                    <i
                        class="fa-solid fa-eye absolute text-white top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 group-hover:opacity-100 opacity-0"></i>
                </div>
            </td>
            <td class="border border-gray-300 p-3 ">
                <a href="{{ route('nasabah.show') }}"
                    class="flex justify-center items-center mx-auto w-10 h-8 rounded-md px-4 py-2 group transition ease-in-out  bg-blue-600 hover:-translate-y-1 hover:shadow-md hover:shadow-blue-500/75  duration-500">
                    <i class="fa-solid fa-eye block text-white "></i>
                </a>
            </td>
        </tr>
        @endforeach
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
            <img src="https://picsum.photos/id/15/800/600" class="w-full h-full object-cover" alt="Detail Foto">
        </div>

        <div class="mt-4 text-right">
            <button onclick="toggleModal(false)"
                class="px-4 py-2 bg-gray-800 text-white rounded hover:bg-gray-700 transition">
                Tutup
            </button>
        </div>
    </div>

    <!-- Klik area hitam di luar modal untuk menutup -->
    <div class="absolute inset-0 -z-10" onclick="toggleModal(false)"></div>
</div>

<script>
    function toggleModal(show) {
    const modal = document.getElementById('imageModal');
    const modalContent = document.getElementById('modalContent');
    const body = document.body;

    if (show) {
    modal.classList.remove('hidden');

    body.classList.add('overflow-hidden');

    setTimeout(() => {
    modalContent.classList.remove('scale-95', 'opacity-0');
    modalContent.classList.add('scale-100', 'opacity-100');
    }, 10);

    } else {
    modalContent.classList.remove('scale-100', 'opacity-100');
    modalContent.classList.add('scale-95', 'opacity-0');

    setTimeout(() => {
    modal.classList.add('hidden');
    body.classList.remove('overflow-hidden');
    }, 300);
    }
    }
</script>
@endsection
