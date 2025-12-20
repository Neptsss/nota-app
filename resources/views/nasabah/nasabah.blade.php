@extends('template.layout')
@section('content')

<div class="bg-white p-5 rounded-md shadow-md mt-10">
    <div class="my-5">
        <form action="{{ route('nasabah.index') }}" id="searchForm" method="get">
            <div class="flex items-center gap-5">
                <div class="border rounded-xl w-1/4 flex justify-between items-center px-2 ">
                    <i class="fa-solid fa-magnifying-glass block"></i>
                    <input type="text" class="w-full px-2 py-1  focus:outline-none rounded-md block" placeholder="Cari Nama Nasabah"
                        autofocus name="nama_nasabah" value="{{ request('nama_nasabah') }}">
                </div>

                <div
                    class="px-2 py-1 border border-primary rounded-md cursor-pointer hover:bg-primary hover:scale-110 transition-all hover:text-white ease-in-out duration-500  hover:shadow-md hover:shadow-primary/60">
                    <i class="fa-solid fa-arrow-down-short-wide" onclick="filter(this)"></i>
                </div>
                <span onclick="reset()"
                    class="px-2 py-1 border border-primary rounded-md cursor-pointer hover:bg-primary hover:scale-110 transition-all hover:text-white ease-in-out duration-500  hover:shadow-md hover:shadow-primary/60">
                    <i class="fa-solid fa-arrow-rotate-left"></i>
                </span>

                <button type="submit"
                    class="px-2 py-1 border border-primary rounded-md cursor-pointer hover:bg-primary hover:scale-110 transition-all hover:text-white ease-in-out duration-500  hover:shadow-md hover:shadow-primary/60">
                    <i class="fa-solid fa-magnifying-glass block"></i>
                </button>
            </div>

            <div class="mt-5 bg-white rounded-md shadow-md transition-all duration-500 ease-in-out overflow-hidden max-h-0 opacity-0"
                id="filter">

                <div class="p-5">
                    <div class="flex items-center justify-center gap-5">
                        <div>
                            <input type="text" class="w-full px-2 py-1 border rounded-md block" placeholder="No Handphone" name="no_hp"
                                value="{{ request('no_hp') }}">
                        </div>
                        <div>
                            <input type="text" class="w-full px-2 py-1 border rounded-md block" placeholder="No ID" name="no_id"
                                value="{{ request('no_id') }}">
                        </div>
                        <select name="jenis_id" id="" class="border rounded-md px-2 py-1 ">
                            <option selected disabled>-- Pilih Jenis ID --</option>
                            <option value="" {{ request('jenis_id') == '' ? 'selected': '' }}>Semua ID</option>
                            <option value="KTP" {{ request('jenis_id')=="KTP" ? 'selected' : '' }}>KTP</option>
                            <option value="SIM" {{ request('jenis_id')=="SIM" ? 'selected' : '' }}>SIM</option>
                            <option value="PASPOR" {{ request('jenis_id')=="PASPOR" ? 'selected' : '' }}>PASPOR</option>
                        </select>
                    </div>
                </div>
            </div>


        </form>
    </div>

    <table class="table-auto mt-3 w-full">
        <thead>
          <tr>
            <th class="border border-slate-200 px-4 py-2 bg-primary text-white ">No</th>
            <th class="border border-slate-200 px-4 py-2 bg-primary text-white ">Nama Nasabah</th>
            <th class="border border-slate-200 px-4 py-2 bg-primary text-white ">Nomor HandPhone</th>
            <th class="border border-slate-200 px-4 py-2 bg-primary text-white ">Jenis ID</th>
            <th class="border border-slate-200 px-4 py-2 bg-primary text-white ">Nomor ID</th>
            <th class="border border-slate-200 px-4 py-2 bg-primary text-white ">Foto ID</th>
            <th class="border border-slate-200 px-4 py-2 bg-primary text-white ">Action</th>
        </tr>
        </thead>

        <tbody>
            @forelse ($nasabah as $item)
            <tr>
                <td class=" border border-slate-200 px-4 py-2">{{ $loop->iteration }}</td>
                <td class=" border border-slate-200 px-4 py-2">{{ $item->nama_nasabah }}</td>
                <td class=" border border-slate-200 px-4 py-2">{{ $item->no_hp }}</td>
                <td class=" border border-slate-200 px-4 py-2">{{ $item->jenis_id }}</td>
                <td class=" border border-slate-200 px-4 py-2">{{ $item->no_id }}</td>
                <td class=" border border-slate-200 px-4 py-2">
                    <div class="relative group cursor-pointer w-20 h-20 mx-auto" onclick="toggleModal(true)"">
                         <img src=" https://picsum.photos/200" alt="" class=" rounded-md group-hover:brightness-50">
                        <i
                            class="fa-solid fa-eye absolute text-white top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 group-hover:opacity-100 opacity-0"></i>
                    </div>

                </td>
                <td class=" border border-slate-200 px-4 py-2">
                    <a href="{{ route('nasabah.show',['nasabah'=>$item->id]) }}"
                        class=" my-5 rounded-md px-2 py-1 flex items-center justify-center gap-4 bg-green-500 text-white hover:scale-110 hover:shadow-md hover:shadow-green-500/60 transition-all duration-300 hover:font-semibold">
                      <i class="fa-solid fa-money-check-dollar"></i>
                    <p>Daftar Transaksi</p>
                    </a>

                </td>
            </tr>
            @empty
            <td colspan="9" class="text-center border border-slate-200 px-4 py-4 text-lg font-semibold">Tidak ada data
                nasabah yang ditemukan</td>
            @endforelse
        </tbody>
    </table>
</div>
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
