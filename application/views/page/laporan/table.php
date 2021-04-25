<div class="table-responsive">
    <table id="table-laporan" class="table table-bordered">
        <thead>
            <tr class="text-center">
                <th>Tanggal Pembayaran</th>        
                <th>NISN</th>
                <th>Atas Nama</th>
                <th>SPP</th>
                <th>Petugas</th>
                <th>Jumlah Bayar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($datafilter as $row) { ?>
            <tr class="text-center">
                <td><?= date_indo($row['tgl_bayar']); ?></td>
                <td><?= $row['nisn']; ?></td>                    
                <td><?= $row['nama_siswa']; ?></td>                    
                <td><?= $row['bulan_dibayar'].' - '.$row['tahun_dibayar']; ?></td>
                <td><?= $row['nama_petugas']; ?></td>
                <td>Rp <?= number_format($row['jumlah_bayar'], 0, ',', '.'); ?></td>
                <td>
                    <a class="btn btn-info p-2 mt-1" target="_blank" href="<?= base_url('laporan/cetak_nota/') . $row['id_pembayaran']; ?>">
                        Cetak Kwitansi
                    </a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php if ($pagelinks) { ?>
    <?= $pagelinks; ?>
    <div class="mt-n5">
    Menampilkan total <?= $total; ?> data 
    </div>
<?php } else { ?>
    <div class="">
    Menampilkan total <?= $total; ?> data 
    </div>
<?php } ?>