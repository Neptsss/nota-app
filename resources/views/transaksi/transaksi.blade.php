@extends('template.layout')
@section('content')
<a href="{{ route('transaksi.create') }}"
    class="block w-1/4  text-center px-4 py-2 my-5 rounded-md transition-all duration-500 hover:shadow-md shadow-primary/60 bg-primary text-white hover:scale-105 ease-in-out hover:font-bold font-semibold">Tambah
    Transaksi</a>

<div class="mt-6 bg-white p-6 rounded-md shadow-md">
    <div class="my-5">
        <form action="{{ route('transaksi.index') }}" id="searchForm" method="get">
            <div class="flex items-center gap-5">
                <div class="border rounded-xl w-1/4 flex justify-between items-center px-2 ">
                    <i class="fa-solid fa-magnifying-glass block"></i>
                    <input type="text" class="w-full px-2 py-1  focus:outline-none rounded-md block"
                        placeholder="Cari No Transaksi" autofocus name="no_transaksi"
                        value="{{ request('no_transaksi') }}">
                </div>

                <div class="px-2 py-1 border border-primary rounded-md cursor-pointer hover:bg-primary hover:scale-110 transition-all hover:text-white ease-in-out duration-500  hover:shadow-md hover:shadow-primary/60"
                    title="Filter ">
                    <i class="fa-solid fa-arrow-down-short-wide" onclick="filter(this)"></i>
                </div>
                <span onclick="reset()"
                    class="px-2 py-1 border border-primary rounded-md cursor-pointer hover:bg-primary hover:scale-110 transition-all hover:text-white ease-in-out duration-500  hover:shadow-md hover:shadow-primary/60"
                    title="Reset Filter">
                    <i class="fa-solid fa-arrow-rotate-left"></i>
                </span>

                <button type="submit"
                    class="px-2 py-1 border border-primary rounded-md cursor-pointer hover:bg-primary hover:scale-110 transition-all hover:text-white ease-in-out duration-500  hover:shadow-md hover:shadow-primary/60"
                    title="Cari ">
                    <i class="fa-solid fa-magnifying-glass block"></i>
                </button>
                <a href="{{ route('transaksi.export', request()->query()) }}"
                    class="px-2 py-1 border border-primary rounded-md cursor-pointer hover:bg-primary hover:scale-110 transition-all hover:text-white ease-in-out duration-500  hover:shadow-md hover:shadow-primary/60"
                    title="Export Excel">
                    <i class="fa-solid fa-file-excel"></i>
                </a>

            </div>

            <div class="mt-5 z-888 bg-white rounded-md shadow-md transition-all duration-500 ease-in-out overflow-hidden max-h-0 opacity-0"
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

                                <option value="Beli" {{ request('jenis_transaksi')=="Beli" ? 'selected' : '' }}>Beli
                                </option>
                                <option value="Jual" {{ request('jenis_transaksi')=="Jual" ? 'selected' : '' }}>Jual
                                </option>
                            </select>
                        </div>

                        <div>
                            <input type="text" class="w-full px-2 py-1 border rounded-md block"
                                placeholder="Nama Nasabah" name="nama_nasabah" value="{{ request('nama_nasabah') }}">
                        </div>
                        <div>
                            <select name="jenis_id" class="px-2 py-1 border rounded md">
                                <option selected disabled>-- Pilih Jenis ID --</option>
                                <option value="KTP" {{ request('jenis_id')=="KTP" ? 'selected' : '' }}>KTP</option>
                                <option value="SIM" {{ request('jenis_id')=="SIM" ? 'selected' : '' }}>SIM</option>
                                <option value="PASPOR" {{ request('jenis_id')=="PASPOR" ? 'selected' : '' }}>PASPOR
                                </option>
                            </select>
                        </div>
                        <div>
                            <select name="mata_uang" class="px-2 py-1 rounded md" id="select_mata_uang">
                                <option selected disabled>-- Pilih Mata Uang --</option>

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
    <div class="my-5">
        {{ $transaksi->links() }}
    </div>
    <table class="table-auto overflow-x-auto w-full bg-white">
        <thead>
            <tr>
                <th class="border border-slate-200 px-4 py-2 bg-primary text-white ">No </th>
                <th class="border border-slate-200 px-4 py-2 bg-primary text-white ">No Transaksi</th>
                <th class="border border-slate-200 px-4 py-2 bg-primary text-white ">Tanggal Transaksi</th>
                <th class="border border-slate-200 px-4 py-2 bg-primary text-white ">Jenis Transaksi</th>
                <th class="border border-slate-200 px-4 py-2 bg-primary text-white ">Nama Nasabah</th>
                <th class="border border-slate-200 px-4 py-2 bg-primary text-white ">Jenis ID</th>
                <th class="border border-slate-200 px-4 py-2 bg-primary text-white ">Mata Uang</th>
                <th class="border border-slate-200 px-4 py-2 bg-primary text-white ">Total (Rp)</th>
                <th class="border border-slate-200 px-4 py-2 bg-primary text-white ">Action</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($transaksi as $item)
            {{-- @dd($item->detail_transaksi->mata_uang) --}}
            <tr>
                <td class="border border-slate-200 px-4 py-2 ">{{$loop->iteration}}</td>
                <td class="border border-slate-200 px-4 py-2 ">{{$item->no_transaksi}}</td>
                <td class="border border-slate-200 px-4 py-2 ">
                    {{\Carbon\Carbon::parse($item->tgl_transaksi)->locale('id')->translatedFormat('d F Y')}}</td>
                <td class="border border-slate-200 px-4 py-2 ">{{$item->jenis_transaksi}}</td>
                <td class="border border-slate-200 px-4 py-2 ">{{$item->nasabah->nama_nasabah}}</td>
                <td class="border border-slate-200 px-4 py-2 ">{{$item->nasabah->jenis_id}}</td>
                <td class="border border-slate-200 px-4 py-2 ">{{$item->detail_transaksi->mata_uang ?? '-'}} </td>
                <td class="border border-slate-200 px-4 py-2 harga_transaksi" data-harga_transaksi={{ $item->
                    detail_transaksi->sub_total
                    }}>{{number_format($item->detail_transaksi->sub_total, 2, ',', '.')}}</td>
                <td class="border border-slate-200 px-4 py-2">
                    <div class="flex justify-center gap-2">
                        <a href="{{ route('transaksi.show',['transaksi'=>$item->token])}}" class=" my-5 rounded-md px-2 py-1 block bg-sky-500 text-white hover:scale-110
                            hover:shadow-md hover:shadow-sky-500/60 transition-all duration-300">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                        <span onclick="modal(this)" data-no_transaksi="{{ $item->no_transaksi }}"
                            data-tgl_transaksi="{{ \Carbon\Carbon::parse($item->tgl_transaksi)->locale('id')->translatedFormat('d F Y') }}"
                            data-jenis_transaksi="{{ $item->jenis_transaksi }}"
                            data-nama_nasabah="{{ $item->nasabah->nama_nasabah }}"
                            data-no_hp="{{ $item->nasabah->no_hp ?? '-' }}"
                            data-identitas="{{ $item->nasabah->jenis_id }} - {{ $item->nasabah->no_id ?? '-' }}"
                            data-mata_uang="{{ $item->detail_transaksi->mata_uang ?? 'IDR' }}"
                            data-jumlah="{{ $item->detail_transaksi->jumlah ?? 0 }}"
                            data-rate="{{ $item->detail_transaksi->rate ?? 1 }}"
                            data-total="{{ $item->detail_transaksi->sub_total ?? 0 }}"
                            class="my-5 rounded-md px-2 py-1 block bg-green-600 text-white hover:scale-110 hover:shadow-md hover:shadow-green-600/60 transition-all duration-300 cursor-pointer">
                            <i class="fa-solid fa-print"></i>
                        </span>
                        <a href="{{route('transaksi.edit',['transaksi'=>$item->token])}}" class=" my-5 rounded-md px-2 py-1 block bg-yellow-500 text-white hover:scale-110
                            hover:shadow-md hover:shadow-yellow-500/60 transition-all duration-300"><i
                                class="fa-solid fa-pen-to-square"></i></a>
                        <form action="{{route('transaksi.delete',['transaksi'=> $item->token])}}" method="POST"
                            class="deleteBtn cursor-pointer">
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
            <td colspan="9" class="text-center border border-slate-200 px-4 py-4 text-lg font-semibold">Tidak ada data
                transaksi yang ditemukan</td>
            @endforelse
        </tbody>
        <tfoot>
            <tr>
                <td colspan="7"
                    class="bg-rose-900 text-white font-bold text-center text-xl px-4 py-2 border border-slate-200">Total
                </td>
                <td colspan="2" class="text-center text-xl font-bold italic px-4 py-2 border border-slate-200"
                    id="total_harga_transaksi">
                </td>
            </tr>
        </tfoot>

    </table>
</div>

{{-- Modal Struk --}}
<div id="modalCard" class="fixed inset-0 z-889 hidden transition-opacity duration-300">
    <div class="absolute inset-0 bg-black/60 backdrop-blur-sm" onclick="closeModal()"></div>

    <div class="relative flex min-h-screen items-center justify-center p-4">
        <div
            class="w-full max-w-lg rounded-xl bg-white shadow-2xl ring-1 ring-gray-900/5 flex flex-col max-h-[90vh] overflow-auto">

            <div class="border-b border-gray-200 bg-gray-50/50 p-6 text-center rounded-xl ">
                <h2 class="text-xl font-bold text-gray-800 uppercase tracking-wide">PT Wulung Artha Milia</h2>
                <p class="text-sm text-gray-600">Jl. Basuki Rahmad No. 1 Ngawi</p>
                <p class="text-xs text-gray-500 mt-1">Telp: (0351) 123456 | Email: info@wulungartha.co.id</p>
                <div class="mt-4 inline-block rounded-full  px-3 py-1  font-medium " id="struk_tgl_transaksi">
                    Jumat, 5 Desember 2025
                </div>
            </div>

            <div class="p-6 space-y-6">

                <div class="grid grid-cols-[120px_20px_1fr] gap-y-2 text-sm text-gray-700">
                    <div class="font-medium text-gray-500">No Transaksi</div>
                    <div class="text-center">:</div>
                    <div class="font-bold text-gray-900" id="struk_no_transaksi">Transaksi-5-11-2025</div>

                    <div class="font-medium text-gray-500">Jenis Transaksi</div>
                    <div class="text-center">:</div>
                    <div id="struk_jenis_transaksi">Beli</div>

                    <div class="font-medium text-gray-500">Nasabah</div>
                    <div class="text-center">:</div>
                    <div id="struk_nama_nasabah">User1</div>

                    <div class="font-medium text-gray-500">No HP</div>
                    <div class="text-center">:</div>
                    <div id="struk_no_hp">0808080808</div>

                    <div class="font-medium text-gray-500">Identitas</div>
                    <div class="text-center">:</div>
                    <div id="struk_identitas">KTP - 321312</div>
                </div>

                <div class="border-t-2 border-dashed border-gray-200"></div>

                <div class="grid grid-cols-[120px_20px_1fr] gap-y-2 text-sm text-gray-700">
                    <div class="font-medium text-gray-500">Mata Uang</div>
                    <div class="text-center">:</div>
                    <div class="font-semibold text-gray-900" id="struk_mata_uang">USD </div>

                    <div class="font-medium text-gray-500">Jumlah</div>
                    <div class="text-center">:</div>
                    <div id="struk_jumlah">$ 100.00</div>

                    <div class="font-medium text-gray-500">Rate</div>
                    <div class="text-center">:</div>
                    <div id="struk_rate">Rp 15.500</div>
                </div>

                <div class="rounded-lg bg-gray-50 p-4 border border-gray-100">
                    <div class="flex items-center justify-between">
                        <span class="text-lg font-bold text-gray-600">Total (IDR)</span>
                        <span class="text-xl font-extrabold " id="struk_total">Rp 1.550.000</span>
                    </div>
                </div>

                <div class="flex justify-between gap-5 pt-4 text-sm text-gray-600 mb-10">
                    <div class="border-b text-center w-1/4 border-gray-500">
                        <p class="mb-12 font-semibold">Penerima</p>
                    </div>
                    <div class="border-b text-center w-1/4 border-gray-500">
                        <p class="mb-12 font-semibold">Petugas</p>
                    </div>
                </div>
            </div>

            <div id="struk-footer"
                class="flex items-center justify-end gap-3 border-t border-gray-200 bg-gray-50 p-4 rounded-b-xl">
                <button onclick="closeModal()"
                    class="cursor-pointer rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-200 transition-all duration-200">
                    Tutup
                </button>
                <button
                    class="cursor-pointer rounded-lg bg-emerald-600 px-4 py-2 text-sm font-bold text-white shadow-sm hover:bg-emerald-700 hover:shadow-lg hover:shadow-emerald-500/30 focus:outline-none focus:ring-2 focus:ring-emerald-500 transition-all duration-200 flex items-center gap-2"
                    onclick="printStruk()">
                    <i class="fa-solid fa-print"></i>
                    Cetak Struk
                </button>
            </div>
        </div>
    </div>
</div>
{{-- end Modal Struk--}}

<script>
    new TomSelect("#select_mata_uang",{
create: false,
sortField: {
field: "text",
direction: "asc"
}
});

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

    setTimeout(() => {
    filterContainer.classList.remove('overflow-hidden');
    filterContainer.classList.add('overflow-visible');
    }, 500);

    } else {

    filterContainer.classList.remove('overflow-visible');
    filterContainer.classList.add('overflow-hidden');

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

const total_harga_transaksi = document.querySelector('#total_harga_transaksi')
const harga_transaksi = document.querySelectorAll('.harga_transaksi')

let total = 0;
harga_transaksi.forEach(item => {
    total += parseFloat(item.dataset.harga_transaksi)
})

total_harga_transaksi.innerText = `Rp ${total.toLocaleString('id-ID')}`




    function modal(element) {
    const modalCard = document.getElementById('modalCard')

    const no_transaksi = document.getElementById('struk_no_transaksi')
    const tgl_transaksi = document.getElementById('struk_tgl_transaksi')
    const jenis_transaksi = document.getElementById('struk_jenis_transaksi')
    const nama_nasabah = document.getElementById('struk_nama_nasabah')
    const no_hp = document.getElementById('struk_no_hp')
    const identitas = document.getElementById('struk_identitas')
    const mata_uang = document.getElementById('struk_mata_uang')
    const jumlah = document.getElementById('struk_jumlah')
    const rate = document.getElementById('struk_rate')
    const total = document.getElementById('struk_total')

    no_transaksi.innerText = element.dataset.no_transaksi
    tgl_transaksi.innerText = element.dataset.tgl_transaksi
    jenis_transaksi.innerText = element.dataset.jenis_transaksi
    nama_nasabah.innerText = element.dataset.nama_nasabah

    no_hp.innerText = element.dataset.no_hp
    identitas.innerText = element.dataset.identitas

    mata_uang.innerText = element.dataset.mata_uang

    const formatUang = {
    minimumFractionDigits: 2,
    maximumFractionDigits: 2
    };

    const jumlahVal = parseFloat(element.dataset.jumlah) || 0;
    const rateVal = parseFloat(element.dataset.rate) || 0;
    const totalVal = parseFloat(element.dataset.total) || 0;

    jumlah.innerText = jumlahVal.toLocaleString('id-ID', formatUang);
    rate.innerText = rateVal.toLocaleString('id-ID', formatUang);
    total.innerText = totalVal.toLocaleString('id-ID', formatUang);

    modalCard.classList.remove('hidden')
    }

    function closeModal(){
    const modalCard = document.getElementById('modalCard')
    modalCard.classList.add('hidden')
    }

    function printStruk() {
    const originalContent = document.querySelector('#modalCard .max-w-lg');
    const printContent = originalContent.cloneNode(true);
    const actionButtons = printContent.querySelector('.rounded-b-xl');

    if (actionButtons) {
    actionButtons.remove();
    }

    const windowPrint = window.open('', '_blank', 'width=900,height=650');

    windowPrint.document.write(`
    <!DOCTYPE html>
    <html>

    <head>
        <title>Cetak Struk Transaksi</title>
        <script src="https://cdn.tailwindcss.com">
            <\/script>
                        <style>
                            @page { size: auto; margin: 0mm; }
                            body { margin: 20px; font-family: sans-serif; }
                            .shadow-2xl { box-shadow: none !important; }
                            .border { border: 1px solid #e5e7eb !important; }
                        </style>
                    </head>
                    <body class="flex justify-center items-start pt-10">
                        <div class="w-[90%]">
                            ${printContent.innerHTML}
                        </div>
                    </body>
                    </html>
                `);

            windowPrint.document.close();
            windowPrint.focus();

            setTimeout(() => {
                windowPrint.print();
                windowPrint.close();
            }, 500);
        }
</script>

@endsection