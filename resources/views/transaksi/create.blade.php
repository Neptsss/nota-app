@extends('template.layout')
@section('content')

<a href="" class="block w-1/4 text-center px-4 py-2 border-blue-500 border my-5 rounded-md transition-all
duration-300 hover:shadow-md shadow-blue-500/60 hover:bg-blue-500 hover:text-white hover:-translate-y-1">Kembali ke Daftar Transaksi</a>
        <form class="border w-[80%] p-5 rounded-md mx-auto" id="notaForm">

            <div class="grid grid-cols-2">
                <div>
                    <label class="block">Tanggal Transaksi</label>
                    <input class="border rounded-md" type="date" id="tanggal_transaksi">
                </div>
                <div>
                    <label class="block">No Transaksi</label>
                    <input class="border rounded-md" type="text" id="no_transaksi">
                </div>
                <div>
                    <label class="block">Nama Nasabah</label>
                    <input class="border rounded-md" type="text" id="nama">
                </div>
                <div>
                    <label class="block">No HP</label>
                    <input class="border rounded-md" type="text" id="no_hp">
                </div>
                <div>
                    <label class="block">Jenis ID</label>
                    <select class="border rounded-md" id="jenis_id">
                        <option>KTP</option>
                        <option>SIM</option>
                        <option>PASPOR</option>
                    </select>
                </div>
                <div>
                    <label class="block">No ID</label>
                    <input class="border rounded-md" type="text" id="no_id">
                </div>
                <div class="no-print">
                    <label class="block">Upload Foto KTP (jpeg)</label>
                    <input class="border rounded-md" type="file" id="foto_ktp" accept="image/*">
                </div>
                <div>
                    </label>Jenis Transaksi </label>
                    <select class="border rounded-md" id="jenis_transaksi">
                        <option class="border rounded-md" value="beli">Beli</option>
                        <option class="border rounded-md" value="jual">Jual</option>
                    </select>
                </div>
            </div>

            <h3>Detail Transaksi</h3>
            <div class="flex gap-4">

                <div>
                    <label class="block">Mata Uang</label>
                    <select class="border rounded-md" type="text" id="mata_uang">
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
                    <label class="block">Jumlah</label>
                    <input class="border rounded-md" type="number" id=>
                    </input>
                </div>

                <div>
                    <label class="block">Rate</label>
                    <input class="border rounded-md" type="number" id=>
                    </input>
                </div>

                <div>
                    <label class="block">Jumlah (RP)</label>
                    <input class="border rounded-md" type="number" id=>
                    </input>
                </div>

            </div>

            <button type="button" class="btn" onclick="tambahBaris()">+ Tambah Baris</button>

            <label class="block">Total RP</label>
            <input class="border rounded-md"type="text" id="total_rp" readonly>

            <p><strong>Catatan:</strong> Kekurangan atau kekeliruan setelah meninggalkan kantor tidak kami layani</p>

            <button type="button" class="btn" onclick="tampilkanStruk()">📄 Lihat Struk</button>
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
            const table = document.getElementById('transaksiTable');
            const row = table.insertRow(-1);
            row.innerHTML = `
        <td><select class="mata-uang">
            <option>AED</option><option>AUD</option><option>BHD</option><option>BND</option>
            <option>SAR</option><option>CAD</option><option>CHF</option><option>CNY</option>
            <option>TWD</option><option>EUR</option><option>GBP</option><option>HKD</option>
            <option>IDR</option><option>JPY</option><option>KRW</option><option>MYR</option>
            <option>SGD</option><option>USD</option><option>VND</option><option>ZAR</option><option>INR</option>
        </select></td>
        <td><input type="number" class="jumlah small-input" oninput="hitung(this)"></td>
        <td><input type="number" step="0.01" class="rate small-input" oninput="hitung(this)"></td>
        <td><input type="text" class="jumlah-rp small-input" readonly></td>
        <td><button type="button" onclick="hapusBaris(this)">Hapus</button></td>
    `;
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
