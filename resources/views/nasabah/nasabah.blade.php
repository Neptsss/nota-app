@extends('template.layout')
@section('content')

<div class="bg-white p-5 rounded-md shadow-md mt-10">
    <div class="my-5">
        <form action="" id="searchForm" method="get">
            <div class="flex items-center gap-5">
                <div class="border rounded-xl w-1/4 flex justify-between items-center px-2 ">
                    <i class="fa-solid fa-magnifying-glass block"></i>
                    <input type="text" class="w-full px-2 py-1  focus:outline-none rounded-md block"
                        placeholder="Cari Nama Nasabah" autofocus name="nama_nasabah"
                        value="{{ request('nama_nasabah') }}">
                </div>

                <div
                    class="px-2 py-1 border border-primary rounded-md cursor-pointer hover:bg-primary hover:scale-110 transition-all hover:text-white ease-in-out duration-500  hover:shadow-md hover:shadow-primary/60">
                    <i class="fa-solid fa-arrow-down-short-wide" onclick="filter(this)" title="Filter"></i>
                </div>
                <span onclick="reset()"
                    class="px-2 py-1 border border-primary rounded-md cursor-pointer hover:bg-primary hover:scale-110 transition-all hover:text-white ease-in-out duration-500  hover:shadow-md hover:shadow-primary/60"
                    title="Reset Filter">
                    <i class="fa-solid fa-arrow-rotate-left"></i>
                </span>

                <button type="submit"
                    class="px-2 py-1 border border-primary rounded-md cursor-pointer hover:bg-primary hover:scale-110 transition-all hover:text-white ease-in-out duration-500  hover:shadow-md hover:shadow-primary/60"
                    title="Cari">
                    <i class="fa-solid fa-magnifying-glass block"></i>
                </button>
            </div>

            <div class="mt-5 bg-white rounded-md shadow-md transition-all duration-500 ease-in-out overflow-hidden max-h-0 opacity-0"
                id="filter">

                <div class="p-5">
                    <div class="flex items-center justify-center gap-5">
                        <div>
                            <input type="text" class="w-full px-2 py-1 border rounded-md block"
                                placeholder="No Handphone" name="no_hp" value="{{ request('no_hp') }}">
                        </div>
                        <div>
                            <input type="text" class="w-full px-2 py-1 border rounded-md block" placeholder="No ID"
                                name="no_id" value="{{ request('no_id') }}">
                        </div>
                        <select name="jenis_id" id="" class="border rounded-md px-2 py-1 ">
                            <option selected disabled>-- Pilih Jenis ID --</option>
                            <option value="KTP" {{ request('jenis_id')=="KTP" ? 'selected' : '' }}>KTP</option>
                            <option value="SIM" {{ request('jenis_id')=="SIM" ? 'selected' : '' }}>SIM</option>
                            <option value="PASPOR" {{ request('jenis_id')=="PASPOR" ? 'selected' : '' }}>PASPOR</option>
                        </select>
                    </div>
                </div>
            </div>


        </form>
    </div>
<div class="my-5">
{{ $nasabah->links() }} </div>
    <div class="overflow-x-auto">
        <table class="table-auto mt-3 w-full">
            <thead>
                <tr>
                    <th class="border border-slate-200 px-4 py-2 bg-primary text-white whitespace-nowrap">No</th>
                    <th class="border border-slate-200 px-4 py-2 bg-primary text-white whitespace-nowrap">Nama Nasabah
                    </th>
                    <th class="border border-slate-200 px-4 py-2 bg-primary text-white whitespace-nowrap">Nomor
                        HandPhone</th>
                    <th class="border border-slate-200 px-4 py-2 bg-primary text-white whitespace-nowrap">Jenis ID</th>
                    <th class="border border-slate-200 px-4 py-2 bg-primary text-white whitespace-nowrap">Nomor ID</th>
                    <th class="border border-slate-200 px-4 py-2 bg-primary text-white whitespace-nowrap">Foto ID</th>
                    <th class="border border-slate-200 px-4 py-2 bg-primary text-white whitespace-nowrap">Action</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($nasabah as $item)
                <tr>
                    <td class=" border border-slate-200 px-4 py-2 whitespace-nowrap">{{ $loop->iteration }}</td>
                    <td class=" border border-slate-200 px-4 py-2 whitespace-nowrap">{{ $item->nama_nasabah }}</td>
                    <td class=" border border-slate-200 px-4 py-2 whitespace-nowrap">{{ $item->no_hp }}</td>
                    <td class=" border border-slate-200 px-4 py-2 whitespace-nowrap">{{ $item->jenis_id }}</td>
                    <td class=" border border-slate-200 px-4 py-2 whitespace-nowrap">{{ $item->no_id }}</td>
                    <td class=" border border-slate-200 px-4 py-2 whitespace-nowrap">
                        <div class="relative group cursor-pointer w-32  mx-auto"
                            onclick="toggleModal(true , '{{ asset('img/foto_id/'.$item->foto_id) }}')"">
                         <img src=" {{ asset('img/foto_id/'.$item->foto_id) }}" alt="{{ "Foto ID ".$item->nama_nasabah
                            }}" class=" rounded-md group-hover:brightness-50 foto">
                            <i
                                class="fa-solid fa-eye absolute text-white top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 group-hover:opacity-100 opacity-0"></i>
                        </div>

                    </td>
                    <td class=" border border-slate-200 px-4 py-2 ">
                        <div class="flex items-center gap-5 justify-center">
                            <a href="{{ route('nasabah.show',['nasabah'=>$item->kode_nasabah]) }}"
                                class=" my-5 rounded-md px-2 py-1  gap-4 bg-green-500 text-white hover:scale-110 hover:shadow-md hover:shadow-green-500/60 transition-all duration-300 hover:font-semibold"
                                title="Detail Transaksi">
                                <i class="fa-solid fa-money-check-dollar"></i>
                            </a>
                            <form action="{{route('nasabah.delete',['nasabah'=> $item->kode_nasabah])}}" method="POST"
                                class="deleteBtnNasabah cursor-pointer" title="Hapus Nasabah">
                                @method('DELETE')
                                @csrf
                                <button type="submit"
                                    class="cursor-pointer my-5 rounded-md px-2 py-1 block bg-red-600 text-white hover:scale-110 hover:shadow-md hover:shadow-red-600/60 transition-all duration-300"><i
                                        class="fa-solid fa-trash-can"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <td colspan="9" class="text-center border border-slate-200 px-4 py-4 text-lg font-semibold">Tidak ada
                    data
                    nasabah yang ditemukan</td>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
</div>

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
    const deleteBtnNasabah = document.querySelectorAll('.deleteBtnNasabah')
deleteBtnNasabah.forEach(form => {
    form.addEventListener('submit', (e) => {
        e.preventDefault();

        Swal.fire({
            title: "Apakah anda yakin ?",
            text: "Data yang dihapus tidak bisa dikembalikan lagi dan daftar transaksi nasabah yang bersangkutan juga akan terhapus !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal',
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit()
            }
        })
    })

})


    function reset(){
let currentURL = new URL(window.location.href);
currentURL.search = '';
window.location.href = '';

window.location.href = currentURL.toString()

}



function filter(e) {
const filterContainer = document.querySelector('#filter');

if (filterContainer.classList.contains('max-h-0')) {
filterContainer.classList.remove('max-h-0', 'opacity-0');
filterContainer.classList.add('max-h-[500px]', 'opacity-100');

} else {
filterContainer.classList.remove('max-h-[500px]', 'opacity-100');
filterContainer.classList.add('max-h-0', 'opacity-0');
}

if (e.classList.contains('fa-arrow-down-short-wide')) {
e.classList.remove('fa-arrow-down-short-wide');
e.classList.add('fa-arrow-up-short-wide');
} else {
e.classList.remove('fa-arrow-up-short-wide');
e.classList.add('fa-arrow-down-short-wide');
}
}

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

