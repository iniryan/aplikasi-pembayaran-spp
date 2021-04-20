<!DOCTYPE html><html><head>
    <title><?= $title; ?></title>
	<link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head><body>
    <hr style="border: 1px solid #000000" class="mt-0 p-0">
    <h4 class="text-center mt-3" style="font-size: 18px"><b>BUKTI PEMBAYARAN SPP</b><br><p class="text-center" style="font-size: 12px;">SMK NEGERI 4 MALANG</p></h4>
    <hr style="border: 1px solid #000000">
    <table class="my-2 ml-5 mr-5" style="border: none;">
        <tr>
            <td style="font-size: 12px; color: rgba(0,0,0,0.6);" class="text-right pr-3"><b>NISN / NIS :</b></td>
            <td style="font-size: 12px;"><?= $kwitansi['nisn'].' / '.$kwitansi['nis']; ?></td>
        </tr>
        <tr>
            <td style="font-size: 12px; color: rgba(0,0,0,0.6);" class="text-right pr-3"><b>NAMA SISWA :</b></td>
            <td style="font-size: 12px;"><?= $kwitansi['nama_siswa']; ?></td>
        </tr>
        <tr>
            <td style="font-size: 12px; color: rgba(0,0,0,0.6);" class="text-right pr-3"><b>KELAS :</b></td>
            <td style="font-size: 12px;"><?= $kwitansi['nama_kelas']; ?></td>
        </tr>
        <tr>
            <td style="font-size: 12px; color: rgba(0,0,0,0.6);" class="text-right pr-3"><b>KOMPETENSI KEAHLIAN :</b></td>
            <td style="font-size: 12px;"><?= $kwitansi['kompetensi_keahlian']; ?></td>
        </tr>
        <tr>
            <td style="font-size: 12px; color: rgba(0,0,0,0.6);" class="text-right pr-3"><b>TANGGAL PEMBAYARAN :</b></td>
            <td style="font-size: 12px;"><?= date_indo($kwitansi['tgl_bayar']); ?></td>
        </tr>
        <tr>
            <td style="font-size: 12px; color: rgba(0,0,0,0.6);" class="text-right pr-3"><b>NAMA PETUGAS :</b></td>
            <td style="font-size: 12px;"><?= $kwitansi['nama_petugas']; ?></td>
        </tr>
	</table>
    <table class="my-3" width="100%" style="border: none">
        <tr>
            <td style="font-size: 14px; color: rgba(0,0,0,0.6);" class="text-left pr-3"><b>KETERANGAN</b></td>
            <td style="font-size: 14px; color: rgba(0,0,0,0.6);" class="text-right pr-3"><b>NOMINAL (Rp)</b></td>
        </tr>
    </table>
    <hr style="border: 1px solid #000000">
    <table class="mb-3" width="100%" style="border: none">
        <tr>
            <td style="font-size: 12px; color: rgba(0,0,0,0.6);" class="text-left pr-3 text-uppercase">PEMBAYARAN SPP BULAN <?= $kwitansi['bulan_dibayar'].' TAHUN '.$kwitansi['tahun_dibayar']; ?></td>
            <td style="font-size: 12px; color: rgba(0,0,0,0.6);" class="text-right pr-3">Rp <?= number_format($kwitansi['jumlah_bayar'], 0, ',', '.'); ?></td>
        </tr>
    </table>
    <hr style="border: 1px solid #000000">
    <table class="" width="100%" style="border: none">
        <tr>
            <td style="font-size: 14px; color: rgba(0,0,0,0.6);" class="text-right pr-2"><b>TOTAL</b></td>
            <td style="font-size: 14px; color: rgba(0,0,0,0.6);" class="text-right pr-3"><b>Rp <?= number_format($kwitansi['jumlah_bayar'], 0, ',', '.'); ?></b></td>
        </tr>
        <tr>
            <td style="font-size: 12px; color: rgba(0,0,0,0.6);" class="mt-5 text-left"><b>CATATAN : </b></td>
            <td style="font-size: 12px; color: rgba(0,0,0,0.6);" class="mt-5 text-right"><b>Malang, <?= date('d F Y', time()); ?></b></td>
        </tr>
        <tr>
            <td style="font-size: 12px; color: rgba(0,0,0,0.6);" class="mt-2 text-left">BUKTI PEMBAYARAN HARAP DISIMPAN DENGAN BAIK.</td>
            <td style="font-size: 12px; color: rgba(0,0,0,0.6);" class="mt-4 text-right"><?= $this->session->userdata('nama_petugas'); ?></td>
        </tr>
    </table>
</body></html>