@extends('template.layout')
@section("content")
<div class="container">
    <div class="header">
        <img src="gambarlogo.jpeg" alt="Logo Perusahaan" />
        <div class="header-text">
            <h2>PT WULUNG ARTHA MILIA</h2>
            <p>Jl. Basuki Rahmad No. 1 Ngawi</p>
            <p>Telp: (0351) 123456 | Email: info@wulungartha.co.id</p>
        </div>
    </div>

    <h3 style="text-align: center">Nota Penukaran Valuta Asing</h3>

    <form id="notaForm" action="" method="post">
        <div class="form-grid">
            <div>
                <label>Tanggal Transaksi</label>
                <input type="date" id="tanggal_transaksi" />
            </div>
            <div>
                <label>No Transaksi</label>
                <input type="text" id="no_transaksi" />
            </div>
            <div>
                <label>Nama Nasabah</label>
                <input type="text" id="nama" />
            </div>
            <div>
                <label>No HP</label>
                <input type="text" id="no_hp" />
            </div>
            <div>
                <label>Jenis ID</label>
                <select id="jenis_id">
                    <option>KTP</option>
                    <option>SIM</option>
                    <option>PASPOR</option>
                </select>
            </div>
            <div>
                <label>No ID</label>
                <input type="text" id="no_id" />
            </div>
            <div class="no-print">
                <label>Upload Foto KTP (jpeg)</label>
                <input type="file" id="foto_ktp" accept="image/*" />
            </div>
            <div>
                <label>Jenis Transaksi</label>
                <select id="jenis_transaksi">
                    <option value="beli">Beli</option>
                    <option value="jual">Jual</option>
                </select>
            </div>
        </div>

        <h3>Detail Transaksi</h3>
        <table id="transaksiTable">
            <tr>
                <th>Mata Uang</th>
                <th>Jumlah</th>
                <th>Rate</th>
                <th>Jumlah (RP)</th>
                <th>Aksi</th>
            </tr>
            <tr>
                <td>
                    <select class="mata-uang">
                        @foreach ($mata_uang as $item )
                        <option value="">{{ $item["mata_uang"] }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <input type="number" class="jumlah small-input" oninput="hitung(this)" />
                </td>
                <td>
                    <input type="number" step="0.01" class="rate small-input" oninput="hitung(this)" />
                </td>
                <td>
                    <input type="text" class="jumlah-rp small-input" readonly />
                </td>
                <td>
                    <button type="button" onclick="hapusBaris(this)">Hapus</button>
                </td>
            </tr>
        </table>

        <button type="button" class="btn" onclick="tambahBaris()">
            + Tambah Baris
        </button>

        <label>Total RP</label>
        <input type="text" id="total_rp" readonly />

        <p>
            <strong>Catatan:</strong> Kekurangan atau kekeliruan setelah
            meninggalkan kantor tidak kami layani
        </p>

        <button type="button" class="btn" onclick="tampilkanStruk()">
            📄 Lihat Struk
        </button>
    </form>
</div>

<div id="strukContainer">
    <div class="struk-header">
        <img src="gambarlogo.jpeg" alt="Logo Perusahaan" />
        <h2>PT WULUNG ARTHA MILIA</h2>
        <p>Jl. Basuki Rahmad No. 1 Ngawi</p>
        <p>Telp: (0351) 123456 | Email: info@wulungartha.co.id</p>
        <hr />
    </div>
    <div id="strukContent"></div>
    <button class="btn" onclick="window.print()">
        🖨️ Cetak / Simpan PDF
    </button>
</div>

<script>
    function hitung(el) {
      const row = el.parentElement.parentElement;
      const jumlah = parseFloat(row.querySelector(".jumlah").value) || 0;
      const rate = parseFloat(row.querySelector(".rate").value) || 0;
      row.querySelector(".jumlah-rp").value = (jumlah * rate).toLocaleString(
        "id-ID"
      );
      hitungTotal();
    }

    function hitungTotal() {
      let total = 0;
      document.querySelectorAll(".jumlah-rp").forEach((el) => {
        total +=
          parseFloat(el.value.replace(/\./g, "").replace(",", ".")) || 0;
      });
      document.getElementById("total_rp").value =
        total.toLocaleString("id-ID");
    }

    function tambahBaris() {
      const table = document.getElementById("transaksiTable");
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
        <p><strong>Tanggal Transaksi:</strong> ${
          document.getElementById("tanggal_transaksi").value
        }</p>
        <p><strong>No Transaksi:</strong> ${
          document.getElementById("no_transaksi").value
        }</p>
        <p><strong>Nama Nasabah:</strong> ${
          document.getElementById("nama").value
        }</p>
        <p><strong>No HP:</strong> ${document.getElementById("no_hp").value}</p>
        <p><strong>Jenis ID:</strong> ${
          document.getElementById("jenis_id").value
        }</p>
        <p><strong>No ID:</strong> ${document.getElementById("no_id").value}</p>
        <p><strong>Jenis Transaksi:</strong> ${
          document.getElementById("jenis_transaksi").value
        }</p>
        <h3>Rincian Transaksi</h3>
        <table class="struk-table">
            <tr><th>Mata Uang</th><th>Jumlah</th><th>Rate</th><th>Jumlah (RP)</th></tr>
    `;

      document
        .querySelectorAll("#transaksiTable tr:not(:first-child)")
        .forEach((row) => {
          strukHTML += `
            <tr>
                <td>${row.querySelector(".mata-uang").value}</td>
                <td>${row.querySelector(".jumlah").value}</td>
                <td>${row.querySelector(".rate").value}</td>
                <td>${row.querySelector(".jumlah-rp").value}</td>
            </tr>
        `;
        });

      strukHTML += `</table>
        <h3>Total: Rp ${document.getElementById("total_rp").value}</h3>
        <p><strong>Catatan:</strong> Kekurangan atau kekeliruan setelah meninggalkan kantor tidak kami layani</p>
        <br><br>
        <table style="width:100%; text-align:center; border:none;">
            <tr>
                <td><strong>Penerima</strong><br><br><br><br>(___________________)</td>
                <td><strong>Petugas</strong><br><br><br><br>(___________________)</td>
            </tr>
        </table>
    `;

      document.getElementById("strukContent").innerHTML = strukHTML;
      document.getElementById("strukContainer").style.display = "block";

      // 🔥 Kirim ke Google Sheets
      kirimKeGoogleSheets();
    }

    // 💾 Script Kirim ke Google Sheets
    function kirimKeGoogleSheets() {
      const form = document.getElementById("notaForm");
      const data = new FormData(form);

      fetch("YOUR_SCRIPT_URL_HERE", {
          method: "POST",
          body: data,
        })
        .then((res) => res.text())
        .then((response) => console.log("Success:", response))
        .catch((error) => console.error("Error:", error));
    }
</script>
@endsection
