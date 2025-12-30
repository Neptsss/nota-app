<table>
    <thead>
        <tr>
            <th style="font-weight: bold; border: 1px solid #000000; text-align: center; ">No Transaksi</th>
            <th style="font-weight: bold; border: 1px solid #000000; text-align: center; ">Tanggal Transaksi
            </th>
            <th style="font-weight: bold; border: 1px solid #000000; text-align: center; ">Jenis Transaksi
            </th>
            <th style="font-weight: bold; border: 1px solid #000000; text-align: center; ">Nama Nasabah</th>
            <th style="font-weight: bold; border: 1px solid #000000; text-align: center; ">No HP</th>
            <th style="font-weight: bold; border: 1px solid #000000; text-align: center; ">Jenis ID</th>
            <th style="font-weight: bold; border: 1px solid #000000; text-align: center; ">No ID</th>
            <th style="font-weight: bold; border: 1px solid #000000; text-align: center; ">Mata Uang</th>
            <th style="font-weight: bold; border: 1px solid #000000; text-align: center; ">Jumlah</th>
            <th style="font-weight: bold; border: 1px solid #000000; text-align: center; ">Rate</th>
            <th style="font-weight: bold; border: 1px solid #000000; text-align: center; ">Sub total</th>
        </tr>
    </thead>
    <tbody>
        @php $grandTotal = 0; @endphp

        @foreach ($transaksi as $item)
        @php
        $detail = $item->detail_transaksi;
        $subTotal = $detail ? $detail->sub_total : 0;

        $grandTotal += $subTotal;
        @endphp

        <tr>
            <td style="border: 1px solid #000000; text-align: left;">{{ $item->no_transaksi }}</td>
            <td style="border: 1px solid #000000; text-align: center;">{{
                \Carbon\Carbon::parse($item->tgl_transaksi)->locale('id')->translatedFormat('d F Y') }}</td>
            <td style="border: 1px solid #000000; text-align: center;">{{ $item->jenis_transaksi }}</td>

            <td style="border: 1px solid #000000;">{{ $item->nasabah->nama_nasabah ?? '-' }}</td>
            <td style="border: 1px solid #000000;">{{ $item->nasabah->no_hp ?? '-' }}</td>
            <td style="border: 1px solid #000000; text-align: center;">{{ $item->nasabah->jenis_id ?? '-' }}</td>
            <td style="border: 1px solid #000000;">{{ $item->nasabah->no_id ?? '-' }}</td>
            <td style="border: 1px solid #000000; text-align: center;">{{ $detail->mata_uang ?? '-' }}</td>
            <td style="border: 1px solid #000000; text-align: right;">
                {{ $detail ? number_format($detail->jumlah, 0, ',', '.') : 0 }}
            </td>
            <td style="border: 1px solid #000000; text-align: right;">
                {{ $detail ? number_format($detail->rate, 2, ',', '.') : 0 }}
            </td>
            <td style="border: 1px solid #000000; text-align: right;">
                {{ number_format($subTotal, 2, ',', '.') }}
            </td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td colspan="10"
                style="border: 1px solid #000000; font-weight: bold; text-align: right; background-color: #f0f0f0;">
                TOTAL KESELURUHAN
            </td>
            <td style="border: 1px solid #000000; font-weight: bold; text-align: right; background-color: #f0f0f0;">
                Rp {{ number_format($grandTotal, 2, ',', '.') }}
            </td>
        </tr>
    </tfoot>
</table>