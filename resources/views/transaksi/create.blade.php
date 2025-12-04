@extends('template.layout')
@section('content')

<a href="{{ route('transaksi.index')}}"
    class="block w-36 max-w-[20%] text-center px-4 py-2 border-blue-500 border my-5 rounded-md transition-all
duration-300 hover:shadow-md shadow-blue-500/60 hover:bg-blue-500 hover:text-white hover:-translate-y-1 hover:font-bold">
<i class="fa-regular fa-circle-left"></i>
<span>Kembali</span>
</a>
<form class="shadow-xl  w-[95%] p-6 rounded-md mx-auto" id="notaForm">

    <div class="flex flex-wrap justify-between items-center gap-5 ">
        <div class="mb-5">
            <label class="block mb-2 font-semibold">No Transaksi <span class="text-sm text-red-600">*</span></label>
            <input name="no_transaksi" class="border rounded-md px-2 py-1 w-52" type="text" id="no_transaksi">
        </div>
        <div class="mb-5">
            <label class="block mb-2 font-semibold">Tanggal Transaksi <span
                    class="text-sm text-red-600">*</span></label>
            <input name="tgl_transaksi" class="border rounded-md w-52 px-2 py-1" type="date" id="tanggal_transaksi">
        </div>
        <div class="mb-5">
            <label for="" class="block mb-2 font-semibold">Jenis transaksi <span
                    class="text-sm text-red-600">*</span></label>
            <select class="border rounded-md px-2 py-1 w-52 " name="jenis_transaksi">
                <option value="beli">Beli</option>
                <option value="jual">Jual</option>
            </select>
        </div>
        <div class="mb-5">
            <label class="block mb-2 font-semibold">Nama Nasabah <span class="text-sm text-red-600">*</span></label>
            <input name="nama_nasabah" class="border rounded-md w-52 px-2 py-1" type="text" id="nama">
        </div>
        <div class="mb-5">
            <label class="block mb-2 font-semibold">No HP <span class="text-sm text-red-600">*</span></label>
            <input name="no_hp" class="border rounded-md w-52 px-2 py-1" type="text" id="no_hp">
        </div>
        <div class="mb-5">
            <label class="block mb-2 font-semibold">Jenis ID <span class="text-sm text-red-600">*</span></label>
            <select class="border rounded-md w-52 px-2 py-1" name="jenis_id">
                <option value="KTP">KTP</option>
                <option value="SIM">SIM</option>
                <option value="PASPOR">PASPOR</option>
            </select>
        </div>
        <div class="mb-5">
            <label class="block mb-2 font-semibold">No ID <span class="text-sm text-red-600">*</span></label>
            <input name="no_id" class="border rounded-md w-52 px-2 py-1" type="text" id="no_id">
        </div>
        <div class="mb-5">
            <label class="block mb-2 font-semibold">Upload Foto KTP (jpeg) <span
                    class="text-sm text-red-600">*</span></label>
            <input name="foto_id" class="border rounded-md w-52 px-2 py-1" type="file" id="foto_ktp" accept="image/*">
        </div>

    </div>

    <h3 class="font-semibold mb-5">Detail Transaksi </h3>
    <div class="flex gap-4 justify-between items-center flex-wrap" id="detail_container">
        <div>
            <label class="block mb-2 font-semibold">Mata Uang <span class="text-sm text-red-600">*</span></label>
            <select class="border rounded-md w-52 px-2 py-1" type="text" name="mata_uang">
                <option>AED</option>
                <option>AUD</option>
                <option>BHD</option>
                <option>BND</option>
                <option>SAR</option>
                <option>CAD</option>
                <option>CHF</option>
                <option>CNY</option>
                <option>TWD</option>
                <option>EUR</option>
                <option>GBP</option>
                <option>HKD</option>
                <option>IDR</option>
                <option>JPY</option>
                <option>KRW</option>
                <option>MYR</option>
                <option>SGD</option>
                <option>USD</option>
                <option>VND</option>
                <option>ZAR</option>
                <option>INR</option>
            </select>

        </div>

        <div>
            <label class="block mb-2 font-semibold">Jumlah <span class="text-sm text-red-600">*</span></label>
            <input name="jumlah" class="border rounded-md w-52 px-2 py-1" type="number" id>
        </div>

        <div>
            <label class="block mb-2 font-semibold">Rate <span class="text-sm text-red-600">*</span></label>
            <input name="rate" class="border rounded-md w-52 px-2 py-1" type="number" id>
        </div>

        <div>
            <label class="block mb-2 font-semibold">Jumlah (RP)</label>
            <input name="jumlah_rp" class="rounded-md w-52 px-2 py-1 bg-gray-300 text-white focus:outline-0 cursor-auto"
                type="number" readonly>
        </div>
        <div>
            <label class="block mb-2 font-semibold opacity-0 select-none">Hapus</label>
            <button type="button"
                class="rounded-md cursor-pointer px-2 py-1 block bg-red-600 text-white hover:scale-110 hover:shadow-md hover:shadow-red-600/60 transition-all duration-300">
                <i class="fa-solid fa-trash-can"></i>
            </button>
        </div>
    </div>

    <button type="button"
        class="border border-blue-400 my-5 px-4 py-2 rounded-md hover:-translate-y-1 cursor-pointer transition-all duration-300 hover:bg-blue-400 hover:text-white hover:shadow-md hover:shadow-blue-500/60"
        onclick="tambahBaris()">+ Tambah Baris</button>
    <div>
        <label class="block mb-2 font-semibold">Total RP</label>
        <input class=" rounded-md w-52 px-2 py-1 bg-gray-300 text-white focus:outline-0 cursor-auto" type="text"
            name="total_rp" readonly>
    </div>


    <p class="my-5"><strong>Catatan:</strong> Kekurangan atau kekeliruan setelah meninggalkan kantor tidak kami layani
    </p>

    <div class="flex items-center gap-5">
        <button type="button"
            class="border block border-green-600 px-4 py-2 rounded-md transition-all hover:scale-105 duration-300 hover:bg-green-600 hover:text-white hover:shadow-md hover:shadow-green-600/60 hover:font-bold cursor-pointer"
            onclick="tampilkanStruk()">Lihat Struk</button>
        <button type="submit"
            class="border block border-cyan-600 px-4 py-2 rounded-md transition-all hover:scale-105 duration-300 hover:bg-cyan-600 hover:text-white hover:shadow-md hover:shadow-cyan-600/60 hover:font-bold cursor-pointer">Simpan</button>
    </div>
</form>
</div>

<script>
    function hitung(el) {
            const row = el.parentElement.parentElement;
            const jumlah = parseFloat(row.querySelector('.jumlah').value) || 0;
            const rate = parseFloat(row.querySelector('.rate').value) || 0;
            row.querySelector('.jumlah-rp').value = (jumlah * rate).toLocaleString('id-ID');
            hitungTotal();
        }

        function hitungTotal() {
            let total = 0;
            document.querySelectorAll('.jumlah-rp').forEach(el => {
                total += parseFloat(el.value.replace(/\./g, '').replace(',', '.')) || 0;
            });
            document.getElementById('total_rp').value = total.toLocaleString('id-ID');
        }

        function tambahBaris() {

        }

        function hapusBaris(btn) {
            btn.parentElement.parentElement.remove();
            hitungTotal();
        }

        function tampilkanStruk() {
            let strukHTML = `
        <p><strong>Tanggal Transaksi:</strong> ${document.getElementById('tanggal_transaksi').value}</p>
        <p><strong>No Transaksi:</strong> ${document.getElementById('no_transaksi').value}</p>
        <p><strong>Nama Nasabah:</strong> ${document.getElementById('nama').value}</p>
        <p><strong>No HP:</strong> ${document.getElementById('no_hp').value}</p>
        <p><strong>Jenis ID:</strong> ${document.getElementById('jenis_id').value}</p>
        <p><strong>No ID:</strong> ${document.getElementById('no_id').value}</p>
        <p><strong>Jenis Transaksi:</strong> ${document.getElementById('jenis_transaksi').value}</p>
        <h3>Rincian Transaksi</h3>
        <table class="struk-table">
            <tr><th>Mata Uang</th><th>Jumlah</th><th>Rate</th><th>Jumlah (RP)</th></tr>
    `;

            document.querySelectorAll('#transaksiTable tr:not(:first-child)').forEach(row => {
                strukHTML += `
            <tr>
                <td>${row.querySelector('.mata-uang').value}</td>
                <td>${row.querySelector('.jumlah').value}</td>
                <td>${row.querySelector('.rate').value}</td>
                <td>${row.querySelector('.jumlah-rp').value}</td>
            </tr>
        `;
            });

            strukHTML += `</table>
        <h3>Total: Rp ${document.getElementById('total_rp').value}</h3>
        <p><strong>Catatan:</strong> Kekurangan atau kekeliruan setelah meninggalkan kantor tidak kami layani</p>
        <br><br>
        <table style="width:100%; text-align:center; border:none;">
            <tr>
                <td><strong>Penerima</strong><br><br><br><br>(___________________)</td>
                <td><strong>Petugas</strong><br><br><br><br>(___________________)</td>
            </tr>
        </table>
    `;

            document.getElementById('strukContent').innerHTML = strukHTML;
            document.getElementById('strukContainer').style.display = 'block';

            // 🔥 Kirim ke Google Sheets
            kirimKeGoogleSheets();
        }

        // 💾 Script Kirim ke Google Sheets
        function kirimKeGoogleSheets() {
            const form = document.getElementById("notaForm");
            const data = new FormData(form);

            fetch("YOUR_SCRIPT_URL_HERE", {
                    method: "POST",
                    body: data
                })
                .then(res => res.text())
                .then(response => console.log("Success:", response))
                .catch(error => console.error("Error:", error));
        }
</script>
@endsection
