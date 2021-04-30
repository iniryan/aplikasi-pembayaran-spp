<!DOCTYPE html><html><head>
	<title><?= $title; ?></title>
	<link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head><body>
    <img src="assets/img/<?= $sekolah['logo']; ?>" alt="logo_instansi" width="80px" class="" style="position: absolute; top: 5px;">
    <h5 style="line-height: 1.6; font-weight: bold; font-size: 14px" class="text-center mt-1 mb-2">PEMERINTAH PROVINSI <?= $sekolah['provinsi']; ?><br>DINAS PENDIDIKAN<br><?= $sekolah['nama_instansi']; ?><br><?= $sekolah['alamat']; ?><br>Website: <?= $sekolah['website']; ?> email: <?= $sekolah['email']; ?></h5>
    <hr style="border: 1px solid #000000">
    <h4 class="text-center mt-2 mb-3" style="font-size: 14px"><b>LAPORAN TRANSAKSI PEMBAYARAN SPP</b></h4>
    <?php if ( $awal != null && $akhir != null) { ?>
        <h4 class="text-center mb-3" style="font-size: 14px"><?= date_indo($awal); ?> - <?= date_indo($akhir); ?></h4>
    <?php } elseif ($awal != null && $akhir == null) { ?>
        <h4 class="text-center mb-3" style="font-size: 14px">Kelas <?= $kelas['nama_kelas']; ?></h4>
    <?php } else { } ?>
	<table class="table table-bordered">
        <tr class="text-center">
            <th style="font-size: 12px">Tanggal Pembayaran</th>        
            <th style="font-size: 12px" width="10%">NISN / NIS</th>
            <th style="font-size: 12px">Atas Nama</th>
            <th style="font-size: 12px">Bulan / Tahun</th>
            <th style="font-size: 12px" width="10%">Petugas</th>
            <th style="font-size: 12px">Jumlah Bayar</th>
        </tr>
        <?php foreach ($datafilter as $row) { ?>
        <tr class="text-center">
            <td style="font-size: 12px"><?= date_indo($row->tgl_bayar); ?></td>
            <td style="font-size: 12px"><?= $row->nisn.' / '.$row->nis; ?></td>                    
            <td style="font-size: 12px"><?= $row->nama_siswa; ?></td>                    
            <td style="font-size: 12px"><?= $row->bulan_dibayar.' / '.$row->tahun_dibayar; ?></td>
            <td style="font-size: 12px"><?= $row->nama_petugas; ?></td>
            <td style="font-size: 12px">Rp <?= number_format($row->jumlah_bayar, 0, ',', '.'); ?></td>
        </tr>
        <?php } ?>
            <tr class="text-center">
                <td style="font-size: 12px" colspan="5">Total Pendapatan</td>
                <td style="font-size: 12px">Rp <?= number_format($total['a'], 0, ',', '.'); ?></td>
            </tr>
	</table>
    <p class="text-right mt-2 mb-3" style="font-size: 12px"><b>Malang, <?= date('d F Y', time()); ?></b></p>
    <p class="text-right" style="margin-top: 5rem; font-size: 12px"><b>(<?= $this->session->userdata('nama_petugas'); ?>)</b></p>
    <?php if ($awal != null && $akhir == null) { ?>
        <p class="text-left pt-3 mt-2 mb-3" style="font-size: 12px"><b>Catatan : </b></p>
        <p class="text-left mt-2 mb-3" style="font-size: 12px">Bagi namanya yang belum tercantum harap segera untuk menyelesaikan pembayaran.</p>
    <?php } else { } ?>
</body></html>