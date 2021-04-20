<div class="page-header">
    <div>
        <h1>Dashboard</h1>
    </div>
</div>
<?= $this->session->flashdata('message'); ?>  

<div class="row">
    <?php if($this->session->userdata('level') == 'Administrator') { ?>
        <div class="col-xl-4 my-2">
        <div class="card card-count">
            <div class="card-body d-flex flex-column">
                    <div class="counter">
                        <?= $petugas; ?>
                    </div>
                    <div class="pt-2">
                        <p class="text-center font-weight-bold title-card">Data Petugas</p>
                    <a href="<?= base_url('petugas') ?>" class="btn btn-light w-100 py-2">Lihat Semua</a>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
    <div class="col-xl-4 my-2">
        <div class="card card-count">
            <div class="card-body d-flex flex-column">
                    <div class="counter">
                        <?= $transaksi; ?>
                    </div>
                    <div class="pt-2">
                        <p class="text-center font-weight-bold title-card">Data Transaksi Masuk</p>
                        <?php if($this->session->userdata('level') == 'Administrator') { ?>                   
                            <a href="<?= base_url('laporan') ?>" class="btn btn-light w-100 py-2">Lihat Semua</a>
                        <?php } ?>
                        <?php if($this->session->userdata('level') == 'Petugas') { ?>                   
                            <a href="<?= base_url('histori') ?>" class="btn btn-light w-100 py-2">Lihat Semua</a>
                        <?php } ?>                   
                </div>
            </div>
        </div>
    </div>
    <?php if($this->session->userdata('level') == 'Administrator') { ?>
    <div class="col-xl-4 my-2">
        <div class="card card-count">
            <div class="card-body d-flex flex-column">
                    <div class="counter">
                        <?= $siswa; ?>
                    </div>
                    <div class="pt-2">
                        <p class="text-center font-weight-bold title-card">Data Siswa</p>
                    <a href="<?= base_url('siswa') ?>" class="btn btn-light w-100 py-2">Lihat Semua</a>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
</div>

<div class="page-header pt-3">
    <div>
        <h1>Pembayaran Terakhir</h1>
    </div>
</div>

<div class="row">
    <div class="col-lg">
        <div class="card">
            <div class="card-body">
            <div class="table-responsive">
                    <table id="table-histori" class="table table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th>Tanggal Pembayaran</th>        
                                <th>NISN</th>
                                <th>Atas Nama</th>
                                <th>SPP</th>
                                <th>Petugas</th>
                                <th>Jumlah Bayar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($histori as $row) { ?>
                            <tr class="text-center">
                                <td><?= date_indo($row['tgl_bayar']); ?></td>
                                <td><?= $row['nisn']; ?></td>                    
                                <td><?= $row['nama_siswa']; ?></td>                    
                                <td><?= $row['bulan_dibayar'].' - '.$row['tahun_dibayar']; ?></td>
                                <td><?= $row['nama_petugas']; ?></td>
                                <td>Rp <?= number_format($row['jumlah_bayar'], 0, ',', '.'); ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
