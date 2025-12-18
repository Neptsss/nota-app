@extends('template.layout')
@section('content')

<a href="{{ route('transaksi.index')}}" class="block w-36 max-w-[20%] text-center px-4 py-2 border-primary border my-5 rounded-md transition-all
duration-300 hover:shadow-md shadow-primary/60 hover:bg-primary hover:text-white hover:-translate-y-1 hover:font-bold">
    <i class="fa-regular fa-circle-left"></i>
    <span>Kembali</span>
</a>
<form method='post' class="shadow-xl  w-[95%] p-6 rounded-md mx-auto bg-white " id="notaForm"
    action="{{route ('transaksi.update', ["transaksi"=> $transaksi->id])}}">
    @method('put')
    @csrf
    <div class="flex flex-wrap justify-between items-center gap-5 ">
        <div class="mb-5">
            <label class="block mb-2 font-semibold">No Transaksi <span class="text-sm text-red-600">*</span></label>
            <input name="no_transaksi"
                class="border rounded-md px-2 py-1 w-52  @error('no_transaksi') border-red-600 @enderror" type="text"
                id="no_transaksi" placeholder="Masukan nomor transaksi"
                value="{{ @old('no_transaksi') ?? $transaksi->no_transaksi }}">
            @error('no_transaksi')
            <span class="block text-red-600 text-sm">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-5">
            <label class="block mb-2 font-semibold">Tanggal Transaksi <span
                    class="text-sm text-red-600">*</span></label>
            <input name="tgl_transaksi"
                class="border rounded-md w-52 px-2 py-1 @error('tgl_transaksi') border-red-600 @enderror" type="date"
                id="tanggal_transaksi" value="{{ @old('tgl_transaksi') ?? $transaksi->tgl_transaksi }}">
            @error('tgl_transaksi')
            <span class="block text-red-600 text-sm">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-5">
            <label for="" class="block mb-2 font-semibold">{{$transaksi->jenis_transaksi}} <span
                    class="text-sm text-red-600">*</span></label>
            <select class="border rounded-md px-2 py-1 w-52 @error('jenis_transaksi') border-red-600 @enderror"
                name="jenis_transaksi">
                <option selected disabled class="text-center">-- Pilih Jenis Transaksi --</option>
                <option value="Beli" {{ @old('jenis_transaksi')=='Beli' || $transaksi->jenis_transaksi == "Beli"?
                    'selected' : '' }}>Beli</option>
                <option value="Jual" {{ @old('jenis_transaksi')=='Jual' || $transaksi->jenis_transaksi == "Jual"?
                    'selected' : '' }}>Jual</option>
            </select>
            @error('jenis_transaksi')
            <span class="block text-red-600 text-sm">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-5">
            <label class="block mb-2 font-semibold">Nama Nasabah <span class="text-sm text-red-600">*</span></label>
            <input name="nama_nasabah"
                class="border rounded-md w-52 px-2 py-1 @error('nama_nasabah') border-red-600 @enderror" type="text"
                id="nama" placeholder="Masukan nama nasabah"
                value="{{ @old('nama_nasabah') ?? $transaksi->nasabah->nama_nasabah }}">
            @error('nama_nasabah')
            <span class="block text-red-600 text-sm">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-5">
            <label class="block mb-2 font-semibold">No HP <span class="text-sm text-red-600">*</span></label>
            <input name="no_hp" class="border rounded-md w-52 px-2 py-1 @error('no_hp') border-red-600 @enderror"
                type="text" id="no_hp" placeholder="Masukan nomor HP nasabah"
                value="{{ @old('no_hp') ?? $transaksi->nasabah->no_hp }}">
            @error('no_hp')
            <span class="block text-red-600 text-sm">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-5">
            <label class="block mb-2 font-semibold">Jenis ID <span class="text-sm text-red-600">*</span></label>
            <select class="border rounded-md w-52 px-2 py-1 @error('jenis_id') border-red-600 @enderror"
                name="jenis_id">
                <option selected disabled class="text-center">-- Pilih Jenis ID --</option>
                {{-- transaksi -> nasabah -> jenis_id --}}
                <option value="KTP" {{ @old('jenis_id')=='KTP' || $transaksi->jenis_id == "KTP" ? 'selected' : '' }}>KTP
                </option>
                <option value="SIM" {{ @old('jenis_ID')=='SIM' || $transaksi->jenis_id == "SIM" ? 'selected' : '' }}>SIM
                </option>
                <option value="PASPOR" {{ @old('jenis_ID')=='PASPOR' || $transaksi->jenis_id == "PASPOR" ? 'selected' :
                    '' }}>PASPOR</option>
            </select>
            @error('jenis_id')
            <span class="block text-red-600 text-sm">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-5">
            <label class="block mb-2 font-semibold">No ID <span class="text-sm text-red-600">*</span></label>
            <input name="no_id" class="border rounded-md w-52 px-2 py-1 @error('no_id') border-red-600 @enderror"
                type="text" id="no_id" placeholder="Masukan nomor ID "
                value="{{ @old('no_id') ?? $transaksi->nasabah->no_id }}">
            @error('no_id')
            <span class="block text-red-600 text-sm">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-5">
            <div class=" mb-2 flex items-center gap-3">
                <label class="block font-semibold">Upload Foto ID (jpeg)
                    <span class="text-sm text-red-600">*</span>
                </label>
                <div class="px-2 py-1 bg-blue-400 rounded-md cursor-pointer hidden hover:bg-blue-500 text-white"
                    onclick="toggleImageModal(true)" id="btn_preview">
                    <i class="fa-solid fa-image-portrait block mx-auto "></i>
                </div>
            </div>
            <input name="foto_id" class="border rounded-md w-52 px-2 py-1" type="file" id="foto_id"
                onchange="fotoId(this)">
        </div>

    </div>

    <h3 class="font-semibold mb-5">Detail Transaksi </h3>
    <div class="flex gap-4 justify-between items-center flex-wrap" id="detail_container">
        <div>
            <label class="block mb-2 font-semibold">Mata Uang <span class="text-sm text-red-600 ">*</span></label>
            <select class="border rounded-md w-52 px-2 py-1 @error('mata_uang') border-red-600 @enderror" type="text"
                name="mata_uang">
                <option selected disabled class="text-center">-- Pilih Mata Uang --</option>
                @foreach ($mata_uang as $item)
                <option value={{ $item->mata_uang }} {{ @old('mata_uang') == $item->mata_uang || $transaksi->detail_transaksi->mata_uang == $item->mata_uang ? 'selected' : '' }}>{{
                    $item->mata_uang }}</option>
                @endforeach
            </select>
            @error('mata_uang')
            <span class="block text-red-600 text-sm">{{$message}}</span>
            @enderror
        </div>

        <div>
            <label class="block mb-2 font-semibold">Jumlah <span class="text-sm text-red-600">*</span></label>
            <input name="jumlah" class="border rounded-md w-52 px-2 py-1 @error('jumlah') border-red-600 @enderror"
                type="text" id="jumlah" placeholder="masukan jumlah uang"
                value="{{ @old('jumlah') ?? $transaksi->detail_transaksi->jumlah }}">
            @error('jumlah')
            <span class="block text-red-600 text-sm">{{$message}}</span>
            @enderror
        </div>



        <div>
            <label class="block mb-2 font-semibold">Rate <span class="text-sm text-red-600">*</span></label>
            <input name="rate" class="border rounded-md w-52 px-2 py-1 @error('rate') border-red-600 @enderror"
                type="text" id="rate" placeholder="masukan jumlah rate uang (Rp)"
                value="{{ @old('rate') ?? $transaksi->detail_transaksi->rate }}">
            @error('rate')
            <span class="block text-red-600 text-sm">{{$message}}</span>
            @enderror
        </div>

        <div>
            <label class="block mb-2 font-semibold">Jumlah (Rp)</label>
            <input name="jumlah_rp" class="rounded-md w-52 px-2 py-1 bg-gray-300  focus:outline-0 cursor-auto"
                type="text" readonly id="jumlah_rp" value="{{ @old('jumlah') ?? $transaksi->detail_transaksi->sub_total }}">
        </div>

    </div>


    <p class="my-5"><strong>Catatan:</strong> Kekurangan atau kekeliruan setelah meninggalkan kantor tidak kami layani
    </p>

    <div class="flex items-center gap-5">
        <button type="button"
            class=" block px-4 py-2 rounded-md transition-all hover:scale-105 duration-300 bg-green-600 text-white hover:shadow-md hover:shadow-green-600/60 font-bold cursor-pointer"
            onclick="modal()">Lihat Struk</button>
        <button type="submit"
            class=" block  px-4 py-2 rounded-md transition-all hover:scale-105 duration-300 bg-yellow-600 text-white hover:shadow-md hover:shadow-yellow-600/60 font-bold cursor-pointer">Ubah
            Data Transaksi</button>
    </div>

</form>
</div>

{{-- Modal --}}

{{-- Modal Image --}}
<div id="imageModal"
    class="fixed inset-0 bg-black/60 backdrop-blur-sm z-50 hidden flex justify-center items-center transition-opacity duration-300">

    <div class="bg-white p-6 rounded-lg shadow-2xl max-w-lg w-full mx-4 transform transition-all scale-95 opacity-0"
        id="modalContent" onclick="event.stopPropagation()">

        <div class="flex justify-between items-center mb-4">
            <h3 class="text-xl font-bold text-gray-800">Foto ID</h3>
            <button onclick="toggleImageModal(false)" class="text-gray-500 hover:text-red-500 transition-colors">
                <i class="fa-solid fa-xmark text-2xl"></i>
            </button>
        </div>

        <div class="w-full h-64 bg-gray-200 rounded overflow-hidden">
            <img src="https://picsum.photos/id/15/800/600" class="w-full h-full object-cover" alt="Detail Foto">
        </div>

        <div class="mt-4 text-right">
            <button onclick="toggleImageModal(false)"
                class="px-4 py-2 bg-gray-800 text-white rounded hover:bg-gray-700 transition">
                Tutup
            </button>
        </div>
    </div>

    <div class="absolute inset-0 -z-10" onclick="toggleModal(false)"></div>
</div>
{{-- end Modal Image --}}

{{-- Modal Struk --}}
<div id="modalCard" class="fixed inset-0 z-50 hidden transition-opacity duration-300">
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

<script src="{{ asset('js/Currency_API.js') }}"></script>

<script>
    function modal(){
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

            no_transaksi.innerText = document.getElementById('no_transaksi').value
            tgl_transaksi.innerText = document.querySelector('input[name="tgl_transaksi"]').value
            jenis_transaksi.innerText = document.querySelector('select[name="jenis_transaksi"]').value
            nama_nasabah.innerText = document.querySelector('input[name="nama_nasabah"]').value
            no_hp.innerText = document.querySelector('input[name="no_hp"]').value
            identitas.innerText = document.querySelector('select[name="jenis_id"]').value + ' - ' + document.querySelector('input[name="no_id"]').value
            mata_uang.innerText = document.querySelector('select[name="mata_uang"]').value
            jumlah.innerText = document.querySelector('input[name="jumlah"]').value
            rate.innerText = document.querySelector('input[name="rate"]').value
            total.innerText = document.querySelector('input[name="jumlah_rp"]').value


            modalCard.classList.remove('hidden')
        }
        function closeModal(){
          const modalCard = document.getElementById('modalCard')
          modalCard.classList.add('hidden')
        }

        function toggleImageModal(show){
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

        function fotoId(e){
         const btnPreview = document.getElementById('btn_preview')
         console.log(btnPreview)
         if(e.files && e.files.length > 0){
         const file = e.files[0];
         const cekExtensions = /\.(jpg|jpeg|png|)$/i;
             if (!cekExtensions.test(file.name)) {
             Swal.fire({
             title: 'Error!',
             text: 'Mohon masukan gambar ( jpg, jpeg, png)',
             icon: 'error',
             confirmButtonText: 'Tutup'
             })

             input.value = '';
             btnPreview.classList.add('hidden');
             return
         }
         btnPreview.classList.remove('hidden')
         }else{
             btnPreview.classList.add('hidden')

          }
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