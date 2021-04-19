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
                    <a href="<?= base_url('laporan') ?>" class="btn btn-light w-100 py-2">Lihat Semua</a>
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
