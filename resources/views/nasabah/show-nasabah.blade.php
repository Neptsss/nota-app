@extends('template.layout')
@section('content')
<a href="{{ route('nasabah.index')}}" class="block w-36 max-w-[20%] text-center px-4 py-2 border-primary border my-5 rounded-md transition-all
duration-300 hover:shadow-md shadow-primary/60 hover:bg-primary hover:text-white hover:-translate-y-1 hover:font-bold">
    <i class="fa-regular fa-circle-left"></i>
    <span>Kembali</span>
</a>
<div class="mt-6 bg-white p-6 rounded-md shadow-md">
    <p class="text-2xl text-primary font-bold mb-4 text-shadow-sm">Daftar Transaksi {{ $nasabah->nama_nasabah }}</p>
    <div class="my-5">
        <form action="" id="searchForm" method="get">
            <div class="flex items-center gap-5">
                <div class="border rounded-xl w-1/4 flex justify-between items-center px-2 ">
                    <i class="fa-solid fa-magnifying-glass block"></i>
                    <input type="text" class="w-full px-2 py-1  focus:outline-none rounded-md block"
                        placeholder="Cari No Transaksi" autofocus name="no_transaksi" value="{{ request('no_transaksi') }}">
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
                            <input type="date" class="w-full px-2 py-1 border rounded-md block" name="tgl_transaksi"
                                value="{{ request('tgl_transaksi') }}">
                        </div>
                        <div>
                            <select name="jenis_transaksi" class="px-2 py-1 border rounded md">
                                <option selected disabled>-- Pilih Jenis Transaksi --</option>
                                <option value="" {{ request('jenis_transaksi') == '' ? 'selected': '' }}>Semua Jenis Transaksi</option>
                                <option value="Beli" {{ request('jenis_transaksi')=="Beli" ? 'selected' : '' }}>Beli
                                </option>
                                <option value="Jual" {{ request('jenis_transaksi')=="Jual" ? 'selected' : '' }}>Jual
                                </option>
                            </select>
                        </div>

                        <div>
                            <select name="mata_uang" class="px-2 py-1 border rounded md">
                                <option selected disabled>-- Pilih Mata Uang --</option>
                                <option value="">Semua Mata Uang</option>
                                @foreach ($mata_uang as $item)
                                <option value="{{ $item->mata_uang }}" {{ request('mata_uang')==$item->mata_uang ?
                                    'selected' : '' }}>{{ $item->mata_uang }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>


        </form>
    </div>
    <table class="w-full">
        <thead>
            <tr>
                <th class="border border-slate-200 px-4 py-2 bg-primary text-white ">No </th>
                <th class="border border-slate-200 px-4 py-2 bg-primary text-white ">No Transaksi</th>
                <th class="border border-slate-200 px-4 py-2 bg-primary text-white ">Tanggal Transaksi</th>
                <th class="border border-slate-200 px-4 py-2 bg-primary text-white ">Jenis Transaksi</th>
                <th class="border border-slate-200 px-4 py-2 bg-primary text-white ">Mata Uang</th>
                <th class="border border-slate-200 px-4 py-2 bg-primary text-white ">Total (Rp)</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($transaksi as $item)
            <tr>
                <td class="border border-slate-200 px-4 py-2">{{$loop->iteration}}</td>
                <td class="border border-slate-200 px-4 py-2">{{$item->no_transaksi}}</td>
                <td class="border border-slate-200 px-4 py-2">{{$item->tgl_transaksi}}</td>
                <td class="border border-slate-200 px-4 py-2">{{$item->jenis_transaksi}}</td>
                <td class="border border-slate-200 px-4 py-2">{{$item->detail_transaksi->mata_uang }}</td>
                <td class="border border-slate-200 px-4 py-2">{{number_format($item->detail_transaksi->sub_total, 2, ',', '.')}}</td>
            </tr>

            @empty
            <td colspan="9" class="text-center border border-slate-200 px-4 py-4 text-lg font-semibold">Tidak ada data
                transaksi yang ditemukan</td>
            @endforelse
        </tbody>

    </table>
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
</script>
@endsection
